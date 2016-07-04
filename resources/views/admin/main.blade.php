@extends('admin.layouts.layout')
@section('title', 'Trang Chủ')
@section('content')
	<table class="function_table" style="margin: 150px auto;">
		<tr>
			<td class="function_item match_list"><a href="{!! route('getListMatch') !!}">Danh Sách Trận Đấu</a></td>
			<td class="function_item match_new"><a href="{!! route('getNewMatch') !!}">Đăng Ký Trận Đấu</a></td>
		</tr>
	</table>
@endsection
