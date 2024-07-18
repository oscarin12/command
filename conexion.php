<?php 
$conn = pg_connect("host=192.168.1.11 dbname=omedina user=externo password=desis123");
if (!$conn) {
  echo "Failed connecting to postgres database efernadez\n";
  exit;
}
?>