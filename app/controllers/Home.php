<?php 

class Home extends Controller {
    public function index()
    {
        $data['title'] = 'My Book Hotel';
        $booking = $this->model('Booking_model');

        $data['rsv'] = $booking->getAllRsv();
        
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('home/myrsv', $data);
        $this->view('templates/footer');
    }

    public function tambahrsv()
    {
        $nama = $_POST['nama'];
        $ci_date = $_POST['ci_date'];
        $co_date = $_POST['co_date'];
        $cost_current = $_POST['cost_current'];
        $cost_total = $_POST['cost_total'];
        $address = $_POST['address'];
        
        $data = [
            'nama' => $nama,
            'ci_date' => $ci_date,
            'co_date' => $co_date,
            'cost_current' => $cost_current,
            'cost_total' => $cost_total,
            'address' => $address
        ];

        $booking = $this->model('Booking_model');
        $booking->tambahDataRsv($data);

    }
}