<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageHelper extends Model
{

    public function resize($filename, $width, $height) {


        $catalogDestination =  public_path();
        $catalogDestination =  $catalogDestination.'/'.'images/';

        $catalog =  storage_path();
        $catalog =  $catalog.'/'.'app/';

		if (!is_file($catalog . $filename) || substr(str_replace('\\', '/', realpath($catalog . $filename)), 0, strlen($catalog)) != str_replace('\\', '/', $catalog) || !file_exists($catalog . $filename)) {

			$filename = 'no_image.png';
		}


		if($height == 0){

			list($nwidth_orig, $nheight_orig, $nimage_type) = getimagesize($catalog . $filename);

			$ratio = $nwidth_orig / $nheight_orig;

			$height = round($width / $ratio);


		}


		$extension = pathinfo($filename, PATHINFO_EXTENSION);

		$image_old = $filename;

        $filename = str_replace('public/images/','', $filename);
		$image_new = 'cache/' . $this->utf8_substr($filename, 0, $this->utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;

		$image_new_webp = 'cachewebp/' . $this->utf8_substr($filename, 0, $this->utf8_strrpos($filename, '.')) . '-' . (int)$width . 'x' . (int)$height . '.webp';


		$gd = gd_info();
		if ($gd['WebP Support']) {
			if (!is_file($catalogDestination . $image_new_webp)) {

				$path = '';

				$directories = explode('/', dirname($image_new_webp));

				foreach ($directories as $directory) {
					$path = $path . '/' . $directory;

					if (!is_dir($catalogDestination . $path)) {
						@mkdir($catalogDestination . $path, 0777);
					}
				}

				//include_once(APPPATH . 'libraries/Image.php');

				//$image_webp = new Image($catalog . $image_old);
				$image_webp = new \App\Libraries\Image($catalog . $image_old);
				$image_webp->resize($width, $height);
				$image_webp->save_webp($catalogDestination . $image_new_webp);
			}
		}else{
			$image_new_webp = false;

			if (!is_file($catalogDestination . $image_new) || (filemtime($catalog . $image_old) > filemtime($catalogDestination . $image_new))) {
				list($width_orig, $height_orig, $image_type) = getimagesize($catalog . $image_old);


				if (!in_array($image_type, array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF))) {
					return $catalog . $image_old;
				}

				$path = '';

				$directories = explode('/', dirname($image_new));

				foreach ($directories as $directory) {
					$path = $path . '/' . $directory;

					if (!is_dir($catalogDestination . $path)) {
						@mkdir($catalogDestination . $path, 0777);
					}
				}

				if ($width_orig != $width || $height_orig != $height) {

					//include_once(APPPATH . 'libraries/Image.php');


					//$image = new Image();
					$image = new \App\Libraries\Image($catalog . $image_old);
					$image->resize($width, $height);
					$image->save($catalogDestination . $image_new);
				} else {
					copy($catalog . $image_old, $catalogDestination . $image_new);
				}
			}
		}



		if($image_new_webp){
			return $image_new_webp;
		}else{
			return $image_new;
		}


	}




    function utf8_substr($string, $offset, $length = null){

        if ($length === null) {
          return mb_substr($string, $offset, $this->utf8_strlen($string));
        } else {
          return mb_substr($string, $offset, $length);
        }

    }

    function utf8_strlen($string){

        return mb_strlen($string);

    }

    function utf8_strrpos($string, $needle){

        return iconv_strrpos($string, $needle, 'UTF-8');

    }

    function utf8_strtolower($string){

        return mb_strtolower($string);

    }

}