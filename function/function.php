<?php
function checkUploadImage($image, $folderImage)
{
    if (isset($image) && $image['error'] == 0) {
        $arrayAllowed = [
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'png' => 'image/png'
        ];

        $imageName = $image['name'];
        $imageType = $image['type'];
        $imageSize = $image['size'];

        $ext = pathinfo($imageName, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $arrayAllowed)) {
            return "Lỗi : Vui lòng chọn đúng định dang file";
        }
        $maxSize = 5 * 1024 * 1024;
        if ($imageSize > $maxSize) {
            return "Lỗi : Kích thước file lớn hơn giới hạn cho phép";
        }
        if (in_array($imageType, $arrayAllowed)) {
            if (file_exists($folderImage . $imageName)) {
                return 'Lỗi : File đã tồn tại.';
            } else {
                move_uploaded_file($image['tmp_name'], $folderImage . $imageName);
                return "Upload file thành công";
            }
        } else {
            return "Lỗi : Có vấn đề xảy ra khi upload file";
        }
    } else {
        return "Lỗi: Image is empty";
    }
}
