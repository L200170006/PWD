Create table gudang(
    Kode_Gudang int(11)Primary key not null,
    Nama_Gudang varchar(50) not null,
    Lokasi varchar(50) not null
);

Create table barang(
    Kode_Barang int(11) primary key not null,
    Nama_Barang varchar(50)not null,
    Kode_Gudang int(11)not null,
    foreign key(Kode_Gudang) references gudang(Kode_Gudang) on delete cascade on update cascade 
);