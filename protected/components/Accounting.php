<?php

/*
 * The kind of an account is defined as follows:
 * Asset = Aset 
 * Cash In Hand = Kas di tangan = KT
 * Cash In Bank = Kas Bank = KB
 * Merchandise Inventory = Persediaan Barang Dagang = PBD
 * Equipment = Peralatan = APR
 * Land = Tanah = AT
 * Building = Bangunan = AB
 * Supplies = Persediaan = AS
 * Account Depreciation Building = Depresiasi Bangunan = DAB
 * Account Depreciation Equipment = Depresiasi Peralatan = DAPR
 * Prepaid Insurance = Asuransi = ASR
 * Receivable = Piutang = APT
 * ------------------
 * Notes Payable = Hutang = LH
 * AccountPayable = Hutang Usaha = LHU 
 * Wages Payable = Hutang Upah = LHH
 * Interest Payable = Bunga Hutang = LHB
 * Unearned Revenues = Uang Muka (Titipsan) = LUM
 * Mortgage Loan Payable = Hipotek = LHT
 * ------------------
 * Capital = Modal = MD
 * ------------------
 * Revenue = Pendapatan = PD
 * ------------------
 * Expense = Pengeluaran (Biaya) = BY
 * Depreciation Expense = Pengeluaran Depresiasi = 
 * ------------------
 * Interest Revenues = Pendapatan dari Bunga
 * ------------------
 * Cost = Biayas
*/

class Accounting {
	
	public static createChartEntry($idadmin, $prefixname, $kind, $level = 1 )
	{
		$data['idref'] = $idadmin;
		$data['kind'] = $kind;
		$data['level'] = $level;
		$data['id'] = idmaker::getCurrentID2();
		$data['userlog'] = Yii->app()->user->id;
		$data['datetimelog'] = idmaker::getDateTime();
		$data['name'] = $prefixname;
		
		Yii::app()->db->createCommand()->insert('raccounts', $data);
	
	
	
	}
}


?>
