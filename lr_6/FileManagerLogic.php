<?php

class FileManagerLogic
{

    public function showAllFiles()
    {
        $rootFolder = 'serverFolder/';
        $fsIterator = new FilesystemIterator($rootFolder);
        echo "<table>".
                "<thead>".
                    "<tr>".
                        "<th scope='col'>№</th>".
                        "<th scope='col'>Name</th>".
                    "</tr>".
                "</thead>".
                "<tbody>".
                    "<tr>";
        $i = 1;
        foreach ($fsIterator as $file) {
            echo "<th scope='row'>" . $i . "</th>";
            echo "<td>" . $file->getFilename() . "</td>";
            echo "</tr>";
            $i++;
        }
        echo "</tbody>".
            "</table>";
    }

    public function downloadFile($fileName)
    {
        $rootFolder = 'serverFolder/';
        $path = $rootFolder . $fileName;
        if (file_exists($path))
        {
            $type = filetype($path);
            $file = $path;
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header("Content-Type: $type");
            header('Content-Disposition: attachment; filename="' . "$fileName" . '"');
            header('Content-Length: ' . filesize($file));
            ob_clean();
            flush();
            readfile($file);
        }
    }

    public function deleteFile($fileName)
    {
        $rootFolder = 'serverFolder/';
        $path = $rootFolder.$fileName;
        unlink($path);
    }

    public function uploadFiles(array $files)
    {
        $rootFolder = 'serverFolder/';
        if ($files['name'][0] != "") {
            for($i = 0; $i < count($files['name']); $i++) {
                $path = $rootFolder . $files['name'][$i];
                if (!move_uploaded_file($files['tmp_name'][$i], $path)) {
                    return false;
                }
            }
        }
    }
}