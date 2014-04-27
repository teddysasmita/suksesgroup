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
 * Depreciation Expense = Pengeluaran Depresiasi = PDR
 * ------------------
 * Interest Revenues = Pendapatan dari Bunga = PBU
 * ------------------
 * Cost = Biaya =
*/

class Accounting {
	
	public $afn = array(
		"KT"=>"Kas Di Tangan",
		"KB"=> "Kas Di Bank",
		"IBD"=> "Persediaan Barang Dagang",
		"APR"=> "Peralatan",
		"AT"=> "Tanah",
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
		"EB"=> "Pengeluaran",
		"EDR"=> "Pengeluaran Depresiasi",
		"RBU"=> "Pendapatan dari Bunga",
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
