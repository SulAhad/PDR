<?php
$mailbox = '{imap.yandex.ru:993/imap/ssl}INBOX';
if (!$inbox = imap_open($mailbox, 'akhad.suleymanov@lab-industries.ru', 'jsejqvrpskdqtbve')) {
    throw new Exception(imap_last_error());
}

foreach(imap_search($inbox,'ALL') as $msg_number) {
    // структура сообщения
    $struct = imap_fetchstructure($inbox, $msg_number);
    var_dump($struct);

    // важные заголовки письма
    $overview = imap_fetch_overview($inbox, $msg_number, 0);
    var_dump($overview[0]);

    // тело сообщения
    $text = imap_fetchbody($inbox, $msg_number, 2);
    var_dump($text);
}

imap_close($inbox);
?>