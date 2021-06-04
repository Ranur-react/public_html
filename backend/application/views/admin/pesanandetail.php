<?php
	$this->db->where("id",intval($_GET["theid"]));
	$db = $this->db->get("transaksi");
	
	foreach($db->result() as $rs){
		$alamat = $this->func->getAlamat($rs->alamat,"semua");
		$kurir = strtoupper($this->func->getKurir($rs->kurir,"nama"))." - ".strtoupper($this->func->getPaket($rs->paket,"nama"));
?>
	<div class="m-b-30">
		<div class="m-b-20">
			Tanggal Pesanan<br/>
			<b><?=$this->func->ubahTgl("d M Y H:i",$rs->tgl)?></b>
		</div>
		<div class="m-b-20">
			Informasi Pengiriman<br/>
			<b><?=$alamat->nama." (".$alamat->nohp.")<br/>".$alamat->alamat?></b>
		</div>
		<div class="m-b-20">
			Kurir Pengiriman<br/>
			<b><?=$kurir?></b>
		</div>
	</div>
	<div class="m-b-12"><b>PRODUK PESANAN</b></div>
<?php
		$this->db->where("idtransaksi",intval($_GET["theid"]));
		$db = $this->db->get("transaksiproduk");
		
		foreach($db->result() as $r){
			$produk = $this->func->getProduk($r->idproduk,"semua");
			if(is_object($produk)){
				$nama = $produk->nama;
				$variasi = $r->variasi != 0 ? $this->func->getVariasi($r->variasi,"semua","id") : "";
				$variasi = $r->variasi != 0 ? $this->func->getVariasiWarna($variasi->warna,"nama")." ".$produk->subvariasi." ".$this->func->getVariasiSize($variasi->size,"nama") : "";
			}else{
				$nama = "Produk telah dihapus";
				$variasi = "";
			}
	?>
	<div class="m-b-12" style="border:1px solid #ccc;border-radius:8px;padding:12px;">
		<div class="row">
			<div class="col-4 col-md-3">
				<img class="col-12" src="<?=$this->func->getFoto($r->idproduk,"utama")?>" />
			</div>
			<div class="col-8 col-md-8 row">
				<div class="col-8 col-md-6">
					<b><?=$nama?></b><br/>
					<small><?=$variasi?></small>
				</div>
				<div class="col-4 col-md-6">
					<?=$r->jumlah." x Rp ".$this->func->formUang($r->harga)?>
				</div>
			</div>
		</div>
	</div>
<?php
		}
	}
?>