<?php
// �����������, �������� ���� ������ VER3
echo "������ ����!"
$link = mysql_connect('mysql_host', 'mysql_user', 'mysql_password')
    or die('�� ������� �����������: ' . mysql_error());
echo '���������� ������� �����������';
mysql_select_db('my_database') or die('�� ������� ������� ���� ������');

// ��������� SQL-������
$query = 'SELECT * FROM my_table';
$result = mysql_query($query) or die('������ �� ������: ' . mysql_error());

// Check ahead, before using it
if (mysql_num_rows($result) > 0) 
{
	// ������� ���������� � html
	echo "<table>\n";
	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	    echo "\t<tr>\n";
	    foreach ($line as $col_value) {
        	echo "\t\t<td>$col_value</td>\n";
	    }
	    echo "\t</tr>\n";
	}
	echo "</table>\n";
}

// ����������� ������ �� ����������
mysql_free_result($result);

// ��������� ����������
mysql_close($link);
?>
