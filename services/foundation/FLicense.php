<?php

class FLicense {
    public static function getNotCheckedLicense($table) {
    $licenses = FEntityManager::getInstance()->selectAll($table);
    if (!$licenses) {
        return [];
    }
    $notCheckedLicenses = [];
    foreach ($licenses as $license) {
        if (!$license->getChecked()) {
            $notCheckedLicenses[] = $license;
        }
    }
    return $notCheckedLicenses;
    }

    public static function getLicenseById($id) {
        $license = FEntityManager::getInstance()->retriveObj(ELicense::class, $id);
        return $license;
    }



}