@if(!$datas || count($datas) == 0)
    <tr>
        <td colspan="20">
            {{config('constants.NO_RECORD')}}
        </td>
    </tr>
@endif
<tr>
    <td colspan="20">
        {{!empty($datas) ? $datas->links() : '' }}
    </td>
</tr>