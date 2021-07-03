<script>
// image slider
var i = 0;
const base = '<?= BASEURL; ?>'
var image = [];

image[0] = 'banner1.jpg';
image[1] = 'banner2.jpg';
image[2] = 'banner3.jpg';
image[3] = 'banner4.jpg';
image[4] = 'banner5.jpg';


$(document).ready(setInterval(() => {
    $('#slide').attr('src', base + 'assets/img/' + image[i]);

    if (i < image.length - 1) {
        i++;
    } else {
        i = 0;
    }

}, 3000))
</script>
<script src="<?= BASEURL . 'assets/js/script.js'; ?>"></script>

</body>

</html>