<?php
class ClearCommand extends CConsoleCommand {
    public function actionPSI() {
        Yii::app() -> db -> createCommand() -> truncateTable('{{pagespeed}}');
    }

    public function actionPdf($olderThan = "-60 days") {
        $rootDir = Yii::app()->getBasePath()."/../pdf";
        $directory = new RecursiveDirectoryIterator($rootDir);
        $iterator = new RecursiveIteratorIterator($directory);

        foreach ($iterator as $file) {
            /**
            * @var $file SplFileInfo
             */
            if($file->isFile()) {
                if($file->getMTime() < strtotime($olderThan)) {
                    unlink($file->getRealPath ());
                }
            }
        }
    }
}