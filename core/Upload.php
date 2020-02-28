<?php

namespace Core;


class Upload
{
    protected $path;
    protected $error;
    protected $ext = [];
    protected $type = [];
    protected $allow;
    protected $maxSize;
    protected $filename;
    protected $useTable = false;
    protected $success = false;


    public function isValid()
    {
        if (empty($this->error)) {
            return true;
        } else {
            return false;
        }
    }
    public function setPath($path)
    {
        $this->path = $path;
        $this->allow = false;
        return $this;
    }

    public function setFileName($name)
    {
        $this->filename = $name;
        return $this;
    }

    public function allowAllFormats()
    {
        $this->allow = true;
        return $this;
    }

    public function setMaxSize($size)
    {
        $this->maxSize = $size * (1024 * 1024);
        return $this;
    }

    public function setValidFile(array $options)
    {
        foreach ($options as $ext => $type) {
            $this->ext[] = $ext;
            $this->type[] = $type;
        }
        return $this;
    }


    public function setErrorMessage($message)
    {
        $this->error[] = $message;
        return $this;
    }

    public function getErrorMessage()
    {
        return $this->error;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    function getExt($string)
    {
        $ext    =   "";
        try {
            $parts  =   explode(".", $string);
            $ext        =   strtolower($parts[count($parts) - 1]);
        } catch (Exception $c) {
            $ext    =   "";
        }
        return $ext;
    }

    public function upload(string $param)
    {

        $size = $_FILES[$param]["size"];
        $name = $_FILES[$param]["name"];
        $ext = $this->getExt($name);
        if (!is_dir($this->path)) {
            $this->setErrorMessage($this->path . " Ce dossier n'existe pas.");
        } else if (!is_writable($this->path)) {
            $this->setErrorMessage("Ce dossier n'est pas valide.");
        } else if (empty($name)) {
            $this->setErrorMessage("Aucun fichier selectionné.");
        } else if ($size > $this->maxSize) {
            $this->setErrorMessage("Fichier trop volumineux.");
        } else if ($this->allow || (!$this->allow && in_array($ext, $this->ext))) {
            if (!in_array(pathinfo($_FILES[$param]['name'], PATHINFO_EXTENSION), $this->ext)) {
                $this->setErrorMessage("Extension invalide.");
            } else if (!in_array(mime_content_type($_FILES[$param]['tmp_name']), $this->type)) {
                $this->setErrorMessage("Type invalide.");
            } else {
                $this->resize_image($_FILES[$param]['tmp_name'], 1280, 960);
                $moved = move_uploaded_file($_FILES[$param]['tmp_name'], $this->path . $this->filename);
                if ($moved) {

                    $this->success = true;
                } else {
                    $this->setErrorMessage('Echec de l\'upload.');
                }
            }
        }
        return $this;
    }

    public function resize_image($file, $width, $height)
    {
        list($w, $h) = getimagesize($file);
        /* calculate new image size with ratio */
        $ratio = max($width / $w, $height / $h);
        $h = ceil($height / $ratio);
        $x = ($w - $width / $ratio) / 2;
        $w = ceil($width / $ratio);
        /* read binary data from image file */
        $imgString = file_get_contents($file);
        /* create image from string */
        $image = imagecreatefromstring($imgString);
        $tmp = imagecreatetruecolor($width, $height);
        imagecopyresampled(
            $tmp,
            $image,
            0,
            0,
            $x,
            0,
            $width,
            $height,
            $w,
            $h
        );
        imagejpeg($tmp, $file, 100);
        return $file;
        /* cleanup memory */
        imagedestroy($image);
        imagedestroy($tmp);
    }

    /**
     * Get the value of success
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * Set the value of success
     *
     * @return  self
     */
    public function setSuccess($success)
    {
        $this->success = $success;

        return $this;
    }
}
