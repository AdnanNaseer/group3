<html>
<head>
</head>

<body>
<?php


    $a=array(1A,1B,1C,1D,2A,2B,2C,2D,3A,3B,3C,3D,4A,4B,4C,4D,
    5A,5B,5C,5D,6A,6B,6C,6D,7A,7B,7C,7D,8A,8B,8C,8D,9A,9B,9C,
    9D,10A,10B,10C,10D,11A,11B,11C,11D,12A,12B,12C,12D,13A,13B,
    13C,13D,14A,14B,14C,14D,15A,15B,15C,15D,16A,16B,16C,16D,17A,
    17B,17C,17D,18A,18B,17C,17D,18A,18B,18C,18D,19A,19B,19C,19D,
    20A,20B,20C,20D,21A,21B,21C,21D,22A,22B,22C,22D,23A,23B,23C,
    23D,24A,24B,24C,24D,25A,25B,25C,25D,26A,26B,26C,26D,27A,27B,
    27C,27D,28A,28B,28C,28D,29A,29B,29C,29D,30A,30B,30C,30D);
    
    // Loop
    $randomKey=array_rand($a);
    unset($a[$randomKey]);
    
    // Test
    echo $randomKey."<br>";
    var_dump($a);

?>

</body>
</html>