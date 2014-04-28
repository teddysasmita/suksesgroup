<?php

/*
 * The kind of an account is defined as follows:
 * Asset = Aset 
 * Cash In Hand = Kas di tangan = AKT
 * Cash In Bank = Kas Bank = AKB
 * Merchandise Inventory = Persediaan Barang Dagang = AMI
 * Equipment = Peralatan = APR
 * Land = Tanah = AL
 * Building = Bangunan = AB
 * Supplies = Persediaan = AS
 * Accumulated Depreciation Building = Akumulasi Depresiasi Bangunan = DAB
 * Accumulated Depreciation Equipment = Akumulasi Depresiasi Peralatan = DAPR
 * Prepaid Insurance = Asuransi = ASR
 * Receivable = Piutang = APT
 * ------------------
 * Notes Payable = Hutang = LH
 * AccountPayable = Hutang Usaha = LHU 
 * Wages Payable = Hutang Upah = LHH
 * Interest Payable = Bunga Hutang = LHB
 * Unearned Revenues = Uang Muka (Titipan) = LUR
 * Mortgage Loan Payable = Hipotek = LHT
 * ------------------
 * Capital = Modal = MD
 * ------------------
 * Revenue = Pendapatan = RV
 * Purchase Retur and Allowance = Retur dan Potongan Pembelian = RRA
 * Interest Revenues = Pendapatan dari Bunga = RI
 * Purchase Discount = Pendapatan dari Diskon/Potongan = RD 
 * ------------------
 * Expense = Pengeluaran (Biaya) = EB
 * Sales Discount = Biaya untuk Diskon/Potongan = ED
 * Depreciation Expense = Pengeluaran Depresiasi = EDR
 * Cost of Goods = Harga Pokok Barang = ECG
 * Sales Retur and Allowance = Retur dan Potongan Penjualan = ERA
 * ------------------
*/

class Accounting {
	
	public $afn = array(
		"AKT"=>"Kas Di Tangan",
		"AKB"=> "Kas Di Bank",
		"AMI"=> "Persediaan Barang Dagang",
		"APR"=> "Peralatan",
		"AL"=> "Tanah",
		"AB"=> "Bangunan",
		"AS"=> "Persediaan",
		"DAB"=> "Depresiasi Bangunan",
		"DAPR"=> "Depresiasi Peralatan",
		"ASR"=> "Asuransi",
		"APT"=> "Piutang",
		"LH"=> "Hutang",
		"LHU"=> "Hutang Usaha",
		"LHH"=> "Hutang Upah",
		"LHB"=> "Bunga Hutang",
		"LUR"=> "Uang Muka (Titipan)",
		"LHT"=> "Hipotek",
		"MD"=> "Modal",
		"RV"=> "Pendapatan Usaha",
		"RRA"=> "Retur dan Potongan Pembelian",
		"RD"=> "Pendapatan dari Potongan",
		"RI"=> "Pendapatan dari Bunga",
		"ED"=> "Potongan",
		"EB"=> "Pengeluaran",
		"ERA"=> "Retur dan Potongan Penjualan",
		"EDR"=> "Pengeluaran Depresiasi",
		"ECG"=> "Harga Pokok Barang",
	);
		
	public function createChartEntry($idadmin, $kind, $level = 1 )
	{
		if (array_key_exists($kind, $this->afn)) {
			$data['idadminref'] = $idadmin;
			$data['kind'] = $kind;
			$data['level'] = $level;
			$data['id'] = idmaker::getCurrentID2();
			$data['userlog'] = Yii::app()->user->id;
			$data['datetimelog'] = idmaker::getDateTime();

			return Yii::app()->accounting->createCommand()->insert('raccounts', $data);
		} else {
			return FALSE;
		};
	}
	
	public static function getChartEntry($idadmin, $kind)
	{
		$result = Yii::app()->accounting->createCommand()
			->select('id')->from('raccounts')
			->where('idadminref = :p_idref and kind = :p_kind',
				array(':p_kind'=>$kind, ':p_idref'=>$idref) )
			->queryScalar();
	}
	
	public static function deleteChartEntry($idadmin)
	{
		Yii::app()->accounting->createCommand()
			->delete('raccounts', 'idadminref = :p_idadmin',
				array('p_idadmin'=>$idadmin));
	}
}


?>
