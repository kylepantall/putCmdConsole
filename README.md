# putCmdConsole

An automated script markup language.

putCmdConsole uses the putCmdEngine to parse and return automated scripts using the putCmd Markupt language.
The markup language is generated using the combination of user given paramters and functions. 
An example of this can be found below:

```
namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class {{$:CLASS_NAME}} extends Command
{
    public static string {{$:DESCRIPTION_VARIABLE('The name of the variable')}} {{\\EOL}}
= '{{ $:PROVIDED_DESCRIPTION('The description of your command') }}';
    /**
     * @return mixed
     */
    public function handle()
    {
        $this->info('{{ $:RETURN_INFO_TEXT('Used to return information to the console.') }}');
    }

    public function automatedFunction()
    {
	$description = {{ join(':', $:CLASS_NAME, $:DESCRIPTION_VARIABLE) }};

	echo "This class, {{$:CLASS_NAME}} is described by {{$:CLASS_NAME}}::{{$DESCRIPTION_VARIABLE}}";
    }
}
```

In the example above, parameters with descriptions (optional) are defined using ```{{$::PARAMETER_NAME}}``` notation. Functions can be used to manipulate generated output. 

To help with formatting, the engine can understand when new lines have been provided for readability by using ```{{EOL}}``` notation (End-of-line) which will remove the carriage return returning a much tidier output.

The given example is a blueprint to how to engine is being developed to work.

The engine has many practicalities, such as providing an intermittent layer to developers such as generating required MySql queries - and in future editions the possibility of validating the query upon returning, or ensuring a user is authorised to use a given stencil with intermittent checks configurable by the end-user.
