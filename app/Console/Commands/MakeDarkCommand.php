<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeDarkCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:dark {--remove} {filename* : Fully qualified name of template file(s).}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds dark mode styles to all normal styles in blade templates.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filenames = $this->argument('filename');
        if (!is_array($filenames)) {
            $filenames = [$filenames];
        }
        foreach ($filenames as $filename) {
            $this->makeDark($filename);
        }
        return 0;
    }

    private function makeDark($filename)
    {
        $t = file_get_contents($filename);
        if ($t === FALSE) {
            $this->warn("Error reading file \"{$filename}\".");
        }
        if ($this->option('remove')) {
            $dt = $this->applyRemoveRules($t);
        } else {
            $dt = $this->applyInvertRules($t);
            $dt = $this->applyRotateRules($dt);
        }
        if ($t !== $dt) {
            file_put_contents($filename, $dt);
        }
    }

    private function applyRemoveRules($t)
    {
        $rules = [
            ' dark:[a-z0-9\-\:]+'
        ];
        $dt = $t;
        foreach ($rules as $rule) {
            $dt = $this->applyRemoveRule($dt, $rule);
        }
        return $dt;
    }

    private function applyRemoveRule($t, $pattern)
    {
        $t = preg_replace("/{$pattern}/", '', $t);
        return $t;
    }

    private function applyRotateRules($t)
    {
        $rules = [
            '(^|[^\.:])((hover:|focus:|active:)?(text|bg|border)-([a-z]+)-([1-9]00|50))',
        ];
        $dt = $t;
        foreach ($rules as $rule) {
            $dt = $this->applyRotateRule($dt, $rule);
        }
        return $dt;
    }

    private function applyRotateRule($t, $pattern)
    {
        $start = 0;
        while (TRUE) {
            $n = preg_match("/{$pattern}/", $t, $m, PREG_OFFSET_CAPTURE, $start);
            if ($n === 0 || count($m) === 0) {
                break;
            }
            $pseudo = $m[3][0];
            $target = $m[4][0];
            $color = $m[5][0];
            $hue = 1000 - $m[6][0];
            if ($hue === 950) {
                $hue = 900;
            }
            $dark = "dark:{$pseudo}{$target}-{$color}-{$hue}";
            [$match, $offset] = $m[2];
            $repl = "{$match} {$dark}";
            $start = $offset + strlen($match);
            if ($hue !== 500 && substr($t, $offset, strlen($repl)) !== $repl) {
                $start += strlen($dark) + 1;
                $len = strlen($match);
                $t = substr_replace($t, $repl, $offset, $len);
            }
        }
        return $t;
    }

    private function applyInvertRules($t)
    {
        $rules = [
            '(^|[^\.:])((hover:|focus:|active:)?(text|bg|border)-(black|white))'
        ];
        $dt = $t;
        foreach ($rules as $rule) {
            $dt = $this->applyInvertRule($dt, $rule);
        }
        return $dt;
    }

    private function applyInvertRule($t, $pattern)
    {
        $icolors = ['white' => 'black', 'black' => 'white'];
        $start = 0;
        while (TRUE) {
            $n = preg_match("/{$pattern}/", $t, $m, PREG_OFFSET_CAPTURE, $start);
            if (0 === $n) {
                break;
            }
            $pseudo = $m[3][0];
            $target = $m[4][0];
            $color = $m[5][0];
            $icolor = $icolors[$color];
            $dark = "dark:{$pseudo}{$target}-{$icolor}";
            [$match, $offset] = $m[2];
            $repl = "{$match} {$dark}";
            $start = $offset + strlen($match);
            if (substr($t, $offset, strlen($repl)) !== $repl) {
                $start += strlen($dark) + 1;
                $len = strlen($match);
                $t = substr_replace($t, $repl, $offset, $len);
            }
        }
        return $t;
    }
}
