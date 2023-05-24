# Phone Number Formatter
This is a simple php class that formats Kenyan phone Numbers and identifies which carrier the number is on.

## Usage
Instantiate the class or extend on your methods
#### Instantiating
 ```<?php
        $newClass = new Identifier;

        // your logic

        # Format phone numbers
        $formatted_number = $newClass->formatted_phone_number('0711 123 456');
        echo $formatted_number;

        # Check ISP
        $isp = $newClass->check_operator($formatted_number);
        echo $isp;
```
#### Extending
```<?php
 class YourClassName extends Identifier{
     // your logic

     public function your_method(){

         # Format phone numbers
        $formatted_number = $this->formatted_phone_number('0711 123 456');
        echo $formatted_number;

        # Check ISP
        $isp = $this->check_operator($formatted_number);
        echo $isp;
     }
 }

```
#### Format Phone Numbers
Pass the phone number in any format to the method ```format_phone_number($param)``` where the ```$param``` is the phone number you wish to format.

#### Check Operator(ISP)
Format the Phone number, and pass the formatted number to the method ```check_operator()```

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
