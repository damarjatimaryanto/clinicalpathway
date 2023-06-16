<?php
require_once 'db_connection.php';

if ($_GET['action'] == "table_data") {


    $columns = array(
        0 => 'NAMA',
        1 => 'NOMR',
        2 => 'ALAMAT',
        3 => 'jenis_layanan',
        4 => 'NOMR',
    );

    $querycount = $mysqli->query(
        "SELECT count(NOMR) as jumlah FROM simrs2012.m_pasien a
                                            LEFT JOIN simrs2012.t_sep b ON a.NOMR = b.NOMR
                                            WHERE b.kelas_rawat = 1 && b.jenis_layanan = 1
                                            -- GROUP BY b.kelas_rawat DESC
                                            LIMIT 10000"
    );
    $datacount = $querycount->fetch_array();


    $totalData = $datacount['jumlah'];

    $totalFiltered = $totalData;

    $limit = $_POST['length'];
    $start = $_POST['start'];
    $order = $columns[$_POST['order']['0']['column']];
    $dir = $_POST['order']['0']['dir'];

    if (empty($_POST['search']['value'])) {
        $query = $mysqli->query("SELECT a.NAMA, a.NOMR, a.ALAMAT, b.jenis_layanan FROM simrs2012.m_pasien a
                                            LEFT JOIN simrs2012.t_sep b ON a.NOMR = b.NOMR
                                            order by $order $dir 
        									LIMIT $limit 
        								    OFFSET $start");
    } else {
        $search = $_POST['search']['value'];
        $query = $mysqli->query("SELECT a.NAMA, a.NOMR, a.ALAMAT, b.jenis_layanan FROM simrs2012.m_pasien a
                                            LEFT JOIN simrs2012.t_sep b ON a.NOMR = b.NOMR
                                            WHERE
            								NAMA LIKE '%$search%' 
                                            or NOMR LIKE '%$search%'
            								order by $order $dir 
            								LIMIT $limit 
            								OFFSET $start");


        $querycount = $mysqli->query("SELECT count (*) FROM simrs2012.m_pasien a
                                            LEFT JOIN simrs2012.t_sep b ON a.NOMR = b.NOMR
                                            WHERE NAMA LIKE '%$search%' 
       										or NOMR LIKE '%$search%'");
        $datacount = $querycount->fetch_array();
        $totalFiltered = $datacount['jumlah'];
    }

    $data = array();
    if (!empty($query)) {
        $no = $start + 1;
        while ($r = $query->fetch_array()) {
            $nestedData['NAMA'] = $r['NAMA'];
            $nestedData['NOMR'] = $r['NOMR'];
            $nestedData['ALAMAT'] = $r['ALAMAT'];
            $nestedData['jenis_layanan'] = $r['jenis_layanan'];
            $nestedData['AKSI'] = "<a href='#' class='btn-warning btn-sm'>Ubah</a>&nbsp; <a href='#' class='btn-danger btn-sm'>Hapus</a>";
            $data[] = $nestedData;
            $no++;
        }
    }

    $json_data = array(
        "draw"            => intval($_POST['draw']),
        "recordsTotal"    => intval($totalData),
        "recordsFiltered" => intval($totalFiltered),
        "data"            => $data
    );

    echo json_encode($json_data);
}
