<?php
///////////////////////////////////////////////////////////////////////////////
while ($row = $result->fetch())
{
    var_dump($row);
}

foreach($result as $row)
{
    foreach($row as $key => $value)
    {
        echo $key.": ".$value."<br />";
    }
}
///////////////////////////////////////////////////////////////////////////////    
function intoTableRow($id, $email, $login)
{
    return "<tr><td>$id<td><td>$email</td><td>$login</td></tr>";
}
$row = $result->fetchAll(PDO::FETCH_FUNC, "intoTableRow");

var_dump($row);

///////////////////////////////////////////////////////////////////////////////
        class Customer
        {
            public $id;
            public $email;
            public $login;
            public function getCustomerInfo()
            {
                return "#$this->id: $this->email, $this->login";
            }
        }

           $result->setFetchMode(PDO::FETCH_INTO, new Customer);
            
            foreach($result as $customer)
            {
                echo $customer->getCustomerInfo()."<br />";
            }
           
?>