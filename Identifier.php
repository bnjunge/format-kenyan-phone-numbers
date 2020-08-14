<?php
class Identifier{
/**
     *
     * Format phone numbers
     * @param int :phone number
     * @return int : formated phone number
     * @return string : invalid error
     * @access public
     */

    public function formatted_phone_number($num)
    {
        $num = str_replace(array(" ", ",", ".", "!", "-", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_"), "", $num);
        if (strlen($num) <= 12) {
            $c = substr($num, 0, 1);
            if (substr($num, 0, 3) == '254' and strlen($num) == 12) {
                return $phone = $num;
            } elseif ((strlen($num) == 10 || strlen($num) == 9) and ($c == 0 or $c == 7)) {
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

    private function identifiers_imsi()
    {
        $countryCareers = array(
            'kenya' => array(
                'carriers' => array(
                    'Safaricom' => array(
                        '254101',
                        '254111',
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
                        '254769'
                    ),
                    'Airtel' => array(
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
                        '254780',
                        '254781',
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
                    ),
                    'Equitel' => array(
                        '254763',
                        '254764',
                        '254765'
                    ),
                    'Faiba4G' => array(
                        '254747'
                    )
                )
            )

        );
        return $countryCareers;
    }

    /**
     * Get Country ISPs
     * @param int :phone number
     * @return string ISP
     * @access public
     */

    public function check_operator($phone)
    {
        $prefix = substr($phone, 0, 6);

        // load providers
        $carrier = $this->identifiers_imsi();
        $cc = json_decode(json_encode($carrier));
        // Providers
        $Safaricom = $cc->kenya->carriers->Safaricom;
        $Airtel = $cc->kenya->carriers->Airtel;
        $Telkom = $cc->kenya->carriers->Telkom;
        $Equitel = $cc->kenya->carriers->Equitel;
        $Faiba4G = $cc->kenya->carriers->Faiba4G;

        // check if number is safaricom
        if (in_array($prefix, $Safaricom)) {
            return 'safaricom';
        } elseif (in_array($prefix, $Airtel)) {
            return 'airtel';
        } elseif (in_array($prefix, $Telkom)) {
            return 'telkom';
        } elseif (in_array($prefix, $Equitel)) {
            return 'equitel';
        } elseif (in_array($prefix, $Faiba4G)) {
            return 'faiba4g';
        } else {
            return 'Invalid Operator';
        }
    }
}
