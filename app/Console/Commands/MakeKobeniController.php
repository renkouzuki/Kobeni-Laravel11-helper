<?php

namespace App\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;

class MakeKobeniController extends GeneratorCommand
{

    protected $name = 'make:kobeniController';

    protected $description = 'Create a new controller class';

    protected $type = 'Controller';

    public function __construct(Filesystem $files)
    {
        parent::__construct($files);
    }

    public function handle()
    {
        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        if ($this->alreadyExists($this->getNameInput())) {
            $this->error($this->type . ' already exists!');
            return false;
        }

        $this->makeDirectory($path);

        $this->files->put($path, $this->sortImports($this->buildClass($name)));

        $this->info($this->type . ' created successfully.');
    }

    protected function getStub()
    {
        return __DIR__ . '/stubs/kobeni.controller.stub';
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Http\Controllers';
    }
}
