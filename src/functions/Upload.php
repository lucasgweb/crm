<?php 
namespace src\functions;

 class Upload{

    public  static function storeImg($file)
    {
        $array = ['error' => ''];

        if (isset($file) && !empty($file['tmp_name'])) {

            $maxWidth = 800;
            $maxHeight = 800;

            if (in_array($file['type'], ['image/png', 'image/jpg', 'image/jpeg'])) {

                list($widthOrig, $heightOrig) = getimagesize($file['tmp_name']);
                $ratio = $widthOrig / $heightOrig;

                $newWidth = $maxWidth;
                $newHeight = $maxHeight;

                $ratioMax = $maxWidth / $maxHeight;

                if ($ratioMax > $ratio) {

                    $newWidth = $newHeight * $ratio;

                } else {
            
                    $newHeight = $newWidth / $ratio;
                }

                
                $finalImage = imagecreatetruecolor($newWidth, $newHeight);

                switch ($file['type']) {
                    case 'image/png':
                        $image = imagecreatefrompng($file['tmp_name']);
                        break;
                    case 'image/jpg':
                    case 'image/jpeg':
                        $image = imagecreatefromjpeg($file['tmp_name']);
                        break;
                }

                imagecopyresampled(
                    $finalImage, $image,
                    0, 0, 0, 0,
                    $newWidth, $newHeight, $widthOrig, $heightOrig
                );

                $photoName = md5(time().rand(0,9999)).'.jpg';
                imagejpeg($finalImage, "media/uploads/". $photoName);

                return $photoName;
                
            }
        } else {
    
            return $array['error'] = 'Nenhuma imagem enviada.';
        }
    }
}