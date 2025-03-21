
<?php
// goto 使用起来非常方便，但是随意使用 goto 语句极易造成代码逻辑混乱，所以应当谨慎使用

goto loop;
echo '这是第一个句子。';

loop:
echo '这是第二个句子。';
?>


<?php

for($i=0; $i<10; $i++) {

    while($i++) {

        if($i==5) goto end;

    }

}

echo '此时 $i=10';

end:

echo '此时 $i=' . $i;
?>
