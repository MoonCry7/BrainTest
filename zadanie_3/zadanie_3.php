<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zadanie 3</title>
</head>
<body>
<center>
	<h2>Входные данные:</h2>
	<form name="enterForm" method="GET" action="<?=$_SERVER['PHP_SELF']?>">
	<table class="iksweb" style = "text-align: center;">
	<tbody>
		<center>
		<tr>
			<td>
				<b>Введите N:</b>
			</td>
			<td>
				<b><input type="text" name="n"></b>
			</td>
			<td>
				<b>Введите K:</b>
			</td>
			<td>
				<b><input type="text" name="k"></b>
			</td>
			<td>
				<input type="submit">
			</td>
		</tr>
	</tbody>
	</table>
    </form>
	<h2>Выходное число:</h2>
	</center>
	<?php 

    $p_str = isset($_GET['n']) ? $_GET['n'] : 0;
    $t_str = isset($_GET['k']) ? $_GET['k'] : 0;
    $n_str = $p_str;
    $k_str = $t_str;
    

function add_prev($n_str, $k_str ){

    function count_added_strings($str_len, $n_str, $k_str ){
        $num_beg = 10 ** ($str_len - 1);
        $num_end = $k_str * 10 ** ( $str_len - strlen($k_str) ) - 1;
        if ($str_len == strlen($n_str)){
            $num_end = min( $num_end, $n_str );
        return $num_end - $num_beg + 1;
        }
    }

    $res = 0;
    foreach(range( strlen ($k_str)+1, strlen ($n_str)+1) as $str_len){
        $res += count_added_strings( $str_len, $n_str, $k_str );
    }
    return $res;
    }


function remove_prev( $k_str ){

    function count_deleted_strings_with_k_dig( $k_str ){
        $res = 0;
        foreach(range(2, strlen($k_str)) as $str_len){
            $res += ( $k_str[0] + 1 ) * 10**($str_len-1) - 1 - $k_str[$str_len] ;
        }
        return $res;
    }

    function count_deleted_strings_with_digits_greater( $k_str ){
        if (strlen($k_str) == 1){
            return 0;
        }
		$kstring = (string)$k_str;
        return ( 9 - $kstring[0]  ) * 1 * ( strlen($kstring)-1 ) ;
        }

    $res = 0;
    $res += count_deleted_strings_with_digits_greater( $k_str );
    return $res;
}

if (($t_str>$p_str) || (empty($t_str)) || (empty($p_str)) || (!is_numeric($t_str)) || (!is_numeric($p_str)) || ($t_str<0) || ($p_str < 0))
	echo "<center><b>Введите корректные данные</b></center>";
	else {		
		$result = $k_str + add_prev( $n_str, $k_str ) - remove_prev( $k_str );
	if (is_nan($result))
		echo "<center><b>Слишком большие числа...</b></center>";
	else echo "<center><b>Результат: ".$result."</b></center>";
		}
 ?> 
 
</body>
</html>