<?php
			$page = (isset($_GET["page"]) AND $_GET["page"] != "") ? $_GET["page"] : 1;
			$perpage = (isset($_GET["perpage"]) AND $_GET["perpage"] != "") ? $_GET["perpage"] : 10;
			$cari = (isset($_POST["cari"]) AND $_POST["cari"] != "") ? $_POST["cari"] : "";
			
			$where = "nama LIKE '%$cari%' OR harga LIKE '%$cari%' OR berat LIKE '%$cari%' OR deskripsi LIKE '%$cari%'";
			$this->db->where($where);
			$row = $this->db->get("produk");
			
			$this->db->where($where);
			$this->db->limit($perpage,($page-1)*$perpage);
			$this->db->order_by("tglupdate DESC");
			$db = $this->db->get("produk");
			
			echo "
				<table class='table'>
					<tr>
						<th>Foto</th>
						<th>Nama Produk</th>
						<th>Detail Harga</th>
						<th style='width:140px'>Stok Produk</th>
						<th style='width:130px;'>Aksi</th>
					</tr>
			";
			if($row->num_rows() == 0){
				echo "
						<tr>
							<th class='text-center text-danger' colspan=4>Belum ada produk.</th>
						</tr>
				";
			}
			$default = base_url("assets/img/no-image.png");
			$no = 1 + (($page-1)*$perpage);
			foreach($db->result() as $r){
				$url = $this->func->getFoto($r->id,"utama");
				$gudang = $this->func->getGudang($r->gudang,"semua");
				$kab = is_object($gudang) ? $this->func->getKab($gudang->idkab,"semua") : "";
				$gudang = is_object($gudang) ? "<br/><span class='text-success'>".$gudang->nama." - ".$kab->tipe." ".$kab->nama."</span>" : "";
				$po = ($r->preorder == 0) ? "" : "<br/><span class='badge badge-warning'>PRE ORDER</span>";
				$thumbnail = (filter_var($url, FILTER_VALIDATE_URL)) ? $url : $default;
				$thumbnail = "<div style='background-image:url(\"".$thumbnail."\")' class='thumbnail-post m-tb-8'></div>";
				$harga = "Normal: IDR ".$this->func->formUang($r->harga)."<br/>";
				$harga .= "Reseller: IDR ".$this->func->formUang($r->hargareseller)."<br/>";
				$harga .= "Agen: IDR ".$this->func->formUang($r->hargaagen)."<br/>";
				$harga .= "Agen Premium: IDR ".$this->func->formUang($r->hargaagensp)."<br/>";
				$harga .= "Distributor: IDR ".$this->func->formUang($r->hargadistri)."";
				$varlist = $this->func->getVariasiJumlah($r->id);
				$stl = ($r->stok > 2) ? " class='text-primary'" : " class='text-danger'";
				$stok = ($varlist > 0) ? "<b".$stl.">".$r->stok."</b><br/><small></i>dari <b>$varlist</b> varian</i></small>" : "<b".$stl.">".$r->stok."</b>";
				$button = "
					<a href='".site_url('ngadimin/produkform/'.$r->id)."' class='btn btn-primary'><i class='fas fa-pencil-alt'></i></a>
					<a href='javascript:void(0)' onclick='hapus(".$r->id.")' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>";
									
				echo "
					<tr>
						<td>$thumbnail</td>
						<td><b>".ucwords($r->nama)."</b>".$gudang."<br/>".$po."</td>
						<td>".$harga."</td>
						<td class='text-center'>".$stok."</td>
						<td style='width:130px;'>
						".$button."
						</td>
					</tr>
				";
				$no++;
			}
			echo "
				</table>
			";
            echo $this->func->createPagination($row->num_rows(),$page,$perpage);

?>