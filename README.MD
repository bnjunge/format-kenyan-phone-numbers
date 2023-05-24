# Phone Number Formatter
This is a simple php class that formats Kenyan phone Numbers and identifies which carrier the number is on.

## Installation
```curl
composer require bnjunge/format-kenyan-phone-numbers
```

## Usage
Instantiate the class or extend on your methods
#### Instantiating
 ```<?php
        use Bnjunge\FormatKenyanPhoneNumbers\Format;


        // your logic

        # Format phone numbers
        $formatted_number = Format::phone('0711 123 456');
        echo $formatted_number;

        # Check ISP
        $isp = Format::operator($formatted_number);
        echo $isp;
```

#### Format Phone Numbers
Pass the phone number in any format to the method ```phone($param)``` where the ```$param``` is the phone number you wish to format. It can contain any character, spaces etc such as 07(12) 123 123 or 07-12 123-123 or 07(12) 123.123

#### Check Operator(ISP/MVNO)
Format the Phone number, and pass the formatted number to the method ```operator($param)```

Operators include:
- Safaricom
- Airtel
- Equitel
- Telkom
- JTL

Unverified IPS/MVNOs
- Sasa Mobile
- Homeland Mobile
- Eferio

### Contribution
This is a work in progress and contributions are highly welcome. You can submit a PR anytime and once we review we might merge or advice.

### License Information
This piece of code is offered under MIT licence. Feel free to use for personal or commercial projects.

We are not responsible for misuse, loss or damages caused or incurred or accrued as a result of usage of this piece of code.
