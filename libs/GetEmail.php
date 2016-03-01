<?php
namespace libs;

class GetEmail
{
    public function email()
    {

        $mbox = imap_open("{pop.mtw.ru:110/pop3}INBOX", "autopriceforparser@reformauto.ru", "265701")
        or die("can't connect: " . imap_last_error());

        $MC = imap_check($mbox);

// Fetch an overview for all messages in INBOX
        $result = imap_fetch_overview($mbox, "1:{$MC->Nmsgs}", 0);
        foreach ($result as $overview) {
            echo "#{$overview->msgno}  FROM: {$overview->from}  {$overview->subject}<br>";
        }
        imap_close($mbox);

    }
}

$test = new GetEmail();
$test->email();