<?php
include_once 'Application/views/head.php';
?>
<center>
    <div class="h1"><span style="margin-top: 50px">Danh sách khách hàng</span></div>
    <div id="dgn_item_bid">
        <div class="dgn_item_bid" style="cursor: auto;width: 900px;">
            <table><tr style="height: 50px"><th style="width: 200px"><span class="dgn_title_blue" style="float: left">Tên </span></th><th style="width: 100px"><span class="dgn_title_blue"  style="float: left">Giới Tính</span></th><th style="width: 300px"><span class="dgn_title_blue"  style="float: left">Email</span></th><th><span class="dgn_title_blue"  style="float: left">Ngày Sinh</span></th></tr>
                <TR />
                <?php

				for($i = 0; $i < count ( $members ); $i ++) {
					$sex = ($members [$i]->getSex () ==1 )?"Male":"Female";
					$uID = $members [$i]->getuserID ();
					if ($members [$i]->getDelete () == 1) {
						print '<font size="3" color="red">';
						print "<TD><a style='text-decoration: none' href=\"index.php?control=user&value=$uID\" > " . $members [$i]->getName () . "</a></TD>
						<TD>" . $sex . "</TD><TD>" . $members [$i]->getEmail () . "</TD>
						<TD>" . $members [$i]->getBirthday () . "</TD>";
						print '</font>';
						print "<TR />";
					
					} else {
						print "<TD><a style='text-decoration: none' href=\"index.php?control=user&value=$uID\" > " . $members [$i]->getName () . "</a></TD>
						<TD>" . $sex . "</TD><TD>" . $members [$i]->getEmail () . "</TD><TD>" . $members [$i]->getBirthday () . "</TD>";
						print "<TR />";
					}
				}
				
				?>

            </table>
        </div>
    </div>
</center>
<?php
include_once'Application/views/footer.php';
?>