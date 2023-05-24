<?php

namespace Bnjunge\FormatKenyanPhoneNumbers;

class Format
{
    /**
     *
     * Format phone numbers
     * @param int :phone number
     * @return int : formated phone number
     * @return string : invalid error
     * @access public
     */
    public static function phone($num)
    {
        $num = preg_replace('/[^0-9]/', '', $num);

        // valid checker, check string
        $_validchecker = substr($num, 2);
        
        if(strlen($_validchecker) <= 7){
            return 'Invalid Phone Number ' . $num;
        }

        if (strlen($num) <= 12 and strlen($num) >= 9) {
            $c = substr($num, 0, 1);
            if (substr($num, 0, 3) == '254' and strlen($num) == 12) {
                return $phone = $num;
            } elseif ((strlen($num) == 10 || strlen($num) == 9) and ($c == 0 or $c == 7 or $c == 1)) {
                $phone = substr($num, -9);
                $phone = '254' . $phone;
                return $phone;
            } else {
                return 'Invalid Phone Number ' . $num;
            }
        }
    }

    /**
     *
     * List Country Telecoms with their assigned prefixes
     * @version 1.0.0
     * @author Benson Njunge <survtechke@gmail.com>
     */
    private static function imsi()
    {
        $countryCareers = array(
            'kenya' => array(
                'carriers' => array(
                    'Safaricom' => array(
                        '254110',
                        '254111',
                        '254112',
                        '254113',
                        '254114',
                        '254115',
                        '254700',
                        '254701',
                        '254702',
                        '254703',
                        '254704',
                        '254705',
                        '254706',
                        '254707',
                        '254708',
                        '254709',
                        '254710',
                        '254711',
                        '254712',
                        '254713',
                        '254714',
                        '254715',
                        '254716',
                        '254717',
                        '254718',
                        '254719',
                        '254720',
                        '254721',
                        '254722',
                        '254723',
                        '254724',
                        '254725',
                        '254726',
                        '254727',
                        '254728',
                        '254729',
                        '254790',
                        '254791',
                        '254792',
                        '254793',
                        '254797',
                        '254798',
                        '254799',
                        '254740',
                        '254741',
                        '254742',
                        '254743',
                        '254745',
                        '254746',
                        '254748',
                        '254757',
                        '254759',
                        '254768',
                        '254769'
                    ),
                    'Airtel' => array(
                        '254100',
                        '254101',
                        '254102',
                        '254103',
                        '254104',
                        '254105',
                        '254731',
                        '254732',
                        '254733',
                        '254734',
                        '254735',
                        '254736',
                        '254737',
                        '254738',
                        '254739',
                        '254750',
                        '254751',
                        '254752',
                        '254753',
                        '254754',
                        '254755',
                        '254756',
                        '254762',
                        '254780',
                        '254781',
                        '254782',
                        '254783',
                        '254784',
                        '254785',
                        '254786',
                        '254787',
                        '254788',
                        '254789'
                    ),
                    'Telkom' => array(
                        '254770',
                        '254771',
                        '254772',
                        '254773',
                        '254774',
                        '254775',
                        '254776',
                        '254777',
                        '254778',
                        '254779',
                    ),
                    'Equitel' => array(
                        '254763',
                        '254764',
                        '254765',
                        '254766'
                    ),
                    'Faiba4G' => array(
                        '254747'
                    ),
                    'Eferio' => array(
                        '254761'
                    ),
                    'Sema_Mobile' => array(
                        '254767'
                    ),
                    'Homelands_media' => array(
                        '254744'
                    )
                )
            )

        );
        return $countryCareers;
    }

    /**
     * Get ISPs from phone number
     * @param int :phone number
     * @return string ISP
     * @access public
     */
    public static function operator($phone)
    {
        $phone = self::phone($phone);
        $prefix = substr($phone, 0, 6);

        // load providers
        $carrier = self::imsi();
        $cc = json_decode(json_encode($carrier));
        // Providers
        $Safaricom = $cc->kenya->carriers->Safaricom;
        $Airtel = $cc->kenya->carriers->Airtel;
        $Telkom = $cc->kenya->carriers->Telkom;
        $Equitel = $cc->kenya->carriers->Equitel;
        $Faiba4G = $cc->kenya->carriers->Faiba4G;
        $Eferio = $cc->kenya->carriers->Eferio;
        $Sema_Mobile = $cc->kenya->carriers->Sema_Mobile;
        $Homelands_media = $cc->kenya->carriers->Homelands_media;

        $operators = [
            'safaricom' => $Safaricom,
            'airtel' => $Airtel,
            'telkom' => $Telkom,
            'equitel' => $Equitel,
            'faiba4g' => $Faiba4G,
            'Eferio' => $Eferio,
            'Sema_Mobile' => $Sema_Mobile,
            'Homelands_media' => $Homelands_media,
          ];

        /**
         * could possibly use an array intersect instead of a foreach loop but not tested
         *
         *
         * $result = array_intersect($operators, [$prefix]);
         *
         * if (!empty($result)) {
         * return key($result);
         * }
        */


        foreach ($operators as $key => $value) {
            if (in_array($prefix, $value)) {
                return $key;
            }
        }

        return 'Invalid Operator';

    }
}
