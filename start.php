<?php
if (php_uname('s')=='Windows NT') {
   exec('chcp 65001');
}
echo "正在计算....".PHP_EOL;
$ans=[0,0,0,0,0,0,0,0,0,0];
$echoAns=['A','B','C','D'];
$len = pow(4,10);
for ($i=0; $i < $len; $i++) {
    $true =0;
   echo "正在计算：";
   echo implode(',',$ans)."是否为正确答案".PHP_EOL;
    for ($k=0; $k < 10; $k++) { 
        $result = call_user_func('q'.$k,$ans);
        if (!$result) {
           echo "错在第".($k+1)."题".PHP_EOL;
            break;
        }else{
            $true++;
            if ($true == 10) {
               echo "答案为：";
                foreach ($ans as $value) {
                    echo $echoAns[$value].',';
                }
                exit();
            }
        }
    }
    $j=0;
    while ($j<10) {
        $ans[$j]++;
        if ($ans[$j]>3) {
            $ans[$j]=0;
            $j++;
        }else{
            break;
        }
    }
}


function q0($ans)
{
    return true;
}

function q1($ans)
{
    switch ($ans[1]) {
        case 0:
            $return = ($ans[4]==2);
            break;
        case 1:
            $return = ($ans[4]==3);
            break;
        case 2:
            $return = ($ans[4]==0);
            break;
        case 3:
            $return = ($ans[4]==1);
            break;
    }
    return $return;
}

function q2($ans)
{
    switch ($ans[2]) {
        case 0:
            $return = ($ans[2]!=$ans[5] && $ans[5]&$ans[1]&$ans[3]);
            break;
        case 1:
            $return = ($ans[5]!=$ans[2] && $ans[2]&$ans[1]&$ans[3]);
            break;
        case 2:
            $return = ($ans[1]!=$ans[2] && $ans[5]&$ans[2]&$ans[3]);
            break;
        case 3:
            $return = ($ans[3]!=$ans[2] && $ans[5]&$ans[1]&$ans[2]);
            break;
    }
    return $return;
}

function q3($ans)
{
    switch ($ans[3]) {
        case 0:
            $return = ($ans[0]==$ans[4]) ;
            break;
        case 1:
            $return = ($ans[1]==$ans[6]) ;
            break;
        case 2:
            $return = ($ans[0]==$ans[8]) ;
            break;
        case 3:
            $return = ($ans[5]==$ans[9]) ;
            break;
    }
    return $return;
}

function q4($ans)
{
    switch ($ans[4]) {
        case 0:
            $return = ($ans[4]==$ans[7]);
            break;
        case 1:
            $return = ($ans[4]==$ans[3]);
            break;
        case 2:
            $return = ($ans[4]==$ans[8]);
            break;
        case 3:
            $return = ($ans[4]==$ans[6]);
            break;
    }
    return $return;
}

function q5($ans)
{
    switch ($ans[5]) {
        case 0:
            $return = ($ans[7]==$ans[1] && $ans[7]==$ans[3]);
            break;
        case 1:
            $return = ($ans[7]==$ans[0] && $ans[7]==$ans[5]);
            break;
        case 2:
            $return = ($ans[7]==$ans[2] && $ans[7]==$ans[9]);
            break;
        case 3:
            $return = ($ans[7]==$ans[4] && $ans[7]==$ans[8]);
            break;
    }
    return $return;
}

function q6($ans)
{
    switch ($ans[6]) {
        case 0:
            $return = isLeast($ans,3);
            break;
        case 1:
            $return = isLeast($ans,2);
            break;
        case 2:
            $return = isLeast($ans,1);
            break;
        case 3:
            $return = isLeast($ans,4);
            break;
    }
    return $return;
}

function q7($ans)
{
    switch ($ans[7]) {
        case 0:
            $return = (abs($ans[6]-$ans[0])!=1);
            break;
        case 1:
            $return = (abs($ans[4]-$ans[0])!=1);
            break;
        case 2:
            $return = (abs($ans[1]-$ans[0])!=1);
            break;
        case 3:
            $return = (abs($ans[9]-$ans[0])!=1);
            break;
    }
    return $return;
}

function q8($ans)
{
    $isSame = ($ans[0]==$ans[5]);
    switch ($ans[8]) {
        case 0:
            $return = (($ans[5]==$ans[4])!=$isSame) ;
            break;
        case 1:
            $return = (($ans[9]==$ans[4])!=$isSame) ;
            break;
        case 2:
            $return = (($ans[1]==$ans[4])!=$isSame) ;
            break;
        case 3:
            $return = (($ans[8]==$ans[4])!=$isSame) ;
            break;
    }
    return $return;
}

function q9($ans)
{
    $times = [0,0,0,0];
    foreach ($ans as $value) {
        $times[$value]++;
    }
    $size = max($times)-min($times);
    switch ($ans[9]) {
        case 0:
            $return = $size==3;
            break;
        case 1:
            $return = $size==2;
            break;
        case 2:
            $return = $size==4;
            break;
        case 3:
            $return = $size==1;
            break;
    }
    return $return;
}

function isLeast($ans,$a)
{
    $times = [0,0,0,0];
    foreach ($ans as $value) {
        $times[$value]++;
    }
    return $times[$a-1]<=$times[0] && $times[$a-1]<=$times[1] && $times[$a-1]<=$times[2] && $times[$a-1]<=$times[3];
}
