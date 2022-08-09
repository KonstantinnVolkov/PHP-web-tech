<?php
include "task_01.php";
include "task_03.php";

    class SafeFormBuilder extends FormBuilder {

        function update(){
            $loggerType = 'console';
            if (count($_GET)) {
                foreach ($_GET as $name => $value) {
                    if ($value != '') {
                        $this->addInput('text', $value, '');
                        if ($loggerType === 'console')
                            CustomLogger::printToConsole($value);
                        else if ($loggerType === 'file')
                            CustomLogger::printToFile($value);
                    }
                }
            }
            if (count($_POST)) {
                foreach ($_POST as $name => $value) {
                    if ($value != '') {
                        $this->addInputWithValue('text', $value, '');
                        if ($loggerType == 'console')
                            CustomLogger::printToConsole($value);
                        else if ($loggerType === 'file')
                            CustomLogger::printToFile($value);
                    }
                }
            }
        }
    }

    $safeFormBuilder = new SafeFormBuilder();
    if (count($_GET) or count($_POST)) {
        $safeFormBuilder->update();
    }
