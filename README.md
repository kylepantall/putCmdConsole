# putCmdConsole

An automated script markup language.

putCmdConsole uses the putCmdEngine to parse and return automated scripts using the putCmd Markupt language.
The markup language is generated using the combination user given paramters and provided functions. 
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
