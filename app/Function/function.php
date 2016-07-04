<?php
	
function listMatch ($data) {
	foreach ($data as $val){
		echo '
		    <tr class="list_data">
                <td>Pháp</td>
                <td>0-0</td>
                <td>Tây Ban Nha</td>
        		<td>12/08/2016 23:00</td>
                <td>13/08/2016 01:00</td>
                <td>12/08/2016 22h45</td>
                <td>2.145</td>
                <td>1.35</td>
                <td>1.95</td>
                <td>
                    <form>
                        <input type="radio" name="rdoPublic" value="Y" checked="checked" /> Mở 
                        <input type="radio" name="rdoPublic" value="N" /> Đóng
                    </form>
                </td>
                <td class="list_td aligncenter">
                    <a href="{!! route('getEditMatch') !!}"><img src="{!! asset('images/edit.png') !!}" /></a>
                </td>
                <td>
                    <a href=""><img src="{!! asset('images/delete.png') !!}" /></a>
                </td>
                <td>
                    <a href="{!! route('getDetailMatch') !!}">
                        <input type="button" name="btnDetail" value="Chi tiết" class="button" />
                    </a>
                </td>
            </tr>'
	}
}

?>