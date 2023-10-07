<form method="POST">
    <input name="length" type="number"/>
    <button type="submit">Submit</button>
</form>

<?php

$length = 1;

if(!empty($_POST['length'])) $length = intval($_POST['length']);

function geometricSequence($length){
    $currentValue = 1;
    $sequence = [$currentValue];

    for($i = 1 ; $i < $length; $i++)
        $sequence[] = $currentValue = $currentValue * 2;

    return $sequence;
}

echo json_encode(geometricSequence($length));


