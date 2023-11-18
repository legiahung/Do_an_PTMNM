-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2023 lúc 11:28 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlts`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `ID_CTHD` varchar(5) NOT NULL,
  `ID_HD` varchar(5) NOT NULL,
  `SOLUONGSP` int(11) NOT NULL,
  `MOTA` varchar(1000) NOT NULL,
  `TINHTRANG` varchar(20) NOT NULL,
  `DONGIA` decimal(10,0) NOT NULL,
  `TONGTIENHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`ID_CTHD`, `ID_HD`, `SOLUONGSP`, `MOTA`, `TINHTRANG`, `DONGIA`, `TONGTIENHD`) VALUES
('CT01', 'DH001', 1, 'Không có', 'Đang giao', 323000, 323000),
('CT02', 'DH002', 2, 'Shop giao hàng lẹ trước ngày mai nhan, để trước cổng nhà, tới nơi gọi em ra.', 'Đã giao', 49000, 98000),
('CT03', 'DH003', 1, 'Shop giao hàng cẩn thận giúp em.', 'Đã hủy đơn', 56700, 56700);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `department`
--

CREATE TABLE `department` (
  `ID_DEP` varchar(5) NOT NULL,
  `NAME_DEP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `department`
--

INSERT INTO `department` (`ID_DEP`, `NAME_DEP`) VALUES
('D01', 'Phòng Nhân Sự'),
('D02', 'Phòng Tài Chính'),
('D03', 'Phòng Kế Toán'),
('D04', 'Phòng Sale'),
('D05', 'Phòng Công nghệ thông tin ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID_GH` int(11) NOT NULL,
  `ID_CUS` varchar(5) NOT NULL,
  `ID_TS` varchar(5) NOT NULL,
  `SOLUONG` int(11) NOT NULL,
  `THANHTIEN` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID_HD` varchar(5) NOT NULL,
  `ID_CUS` varchar(5) NOT NULL,
  `ID_TS` varchar(5) NOT NULL,
  `DIACHINHAN` varchar(200) NOT NULL,
  `SDTNHAN` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID_HD`, `ID_CUS`, `ID_TS`, `DIACHINHAN`, `SDTNHAN`) VALUES
('DH001', 'KH001', 'DC003', 'Trần Phú, Nha Trang, Khánh Hoà', '0324875963'),
('DH002', 'KH002', 'HT002', 'Âu Cơ, Nha Trang, Khánh Hoà', '0324478963'),
('DH003', 'KH003', 'N003', 'Hùng Vương, Tuy Hòa,Phú Yên', '0324875963');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitrangsuc`
--

CREATE TABLE `loaitrangsuc` (
  `ID_LOAITS` varchar(5) NOT NULL,
  `TENLOAITS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitrangsuc`
--

INSERT INTO `loaitrangsuc` (`ID_LOAITS`, `TENLOAITS`) VALUES
('BT01', 'Bông tai'),
('C01', 'Charm'),
('DC01', 'Dây chuyền'),
('N01', 'Nhẫn'),
('PK01', 'Phụ kiện tóc'),
('VT01', 'Vòng tay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ncc`
--

CREATE TABLE `ncc` (
  `ID_NCC` varchar(5) NOT NULL,
  `NAME_NCC` varchar(50) NOT NULL,
  `EMAIL_NCC` varchar(50) NOT NULL,
  `ADDRESS_NCC` varchar(200) NOT NULL,
  `PHONE_NCC` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ncc`
--

INSERT INTO `ncc` (`ID_NCC`, `NAME_NCC`, `EMAIL_NCC`, `ADDRESS_NCC`, `PHONE_NCC`) VALUES
('NCC01', 'Công Ty TNHH Long Ly', 'longlycompany@gmail.com', 'Phòng 202, D3 Tập Thể Nguyễn Công Trứ, Q. Hai Bà Trưng, Hà Nội', '0369258147'),
('NCC02', 'Công Ty TNHH Trang Sức Việt Nam - Simmy', 'simmycompany@gmail.com', '22 Trần Phú, Nha Trang, Khánh Hòa ', '0366547222'),
('NCC03', 'Công Ty TNHH Công Nghệ D.C', 'dccompany@gmail.com', '44 Nguyễn Văn Đậu, Phường 6, Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam', '0322695365');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `position`
--

CREATE TABLE `position` (
  `ID_POS` varchar(5) NOT NULL,
  `NAME_POS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `position`
--

INSERT INTO `position` (`ID_POS`, `NAME_POS`) VALUES
('P01', 'Trưởng bộ phận'),
('P02', 'Trưởng nhóm'),
('P03', 'Quản lý dự án'),
('P04', 'Nhân viên'),
('P05', 'Thực tập sinh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID_TS` varchar(5) NOT NULL,
  `TENTS` varchar(100) NOT NULL,
  `ID_NCC` varchar(5) NOT NULL,
  `GIA` float NOT NULL,
  `ID_LOAITS` varchar(5) NOT NULL,
  `BAOHANH` int(11) NOT NULL,
  `MOTA` varchar(1000) NOT NULL,
  `TINHTRANG` varchar(20) NOT NULL,
  `ANH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ID_TS`, `TENTS`, `ID_NCC`, `GIA`, `ID_LOAITS`, `BAOHANH`, `MOTA`, `TINHTRANG`, `ANH`) VALUES
('C001', 'Charm Bạc Pandora Hình Trái Tim Đính Đá CZ Tím', 'NCC03', 900000, 'C01', 12, 'Charm Bạc Pandora Hình Trái Tim Đính Đá CZ Tím là một phụ kiện trang sức quyến rũ với chất liệu bạc cao cấp. Chiếc charm này có hình dáng trái tim tinh tế, được trang trí bằng đá cubic zirconia màu tím, tạo nên một vẻ đẹp lôi cuốn và quyến rũ.', 'còn hàng', 'images/sp40.jpg'),
('C002', 'Charm Treo Pandora Moments Biểu Tượng Cây Gia Đình Ngôi Sao', 'NCC01', 546000, 'C01', 12, 'Thêm một chút ma thuật ban đêm vào ban ngày của bạn với Double Dangle Tree & Galaxy Moon Charm. Vẻ đẹp trần thế của cây gia phả mang một hình thức thiên thể mới trong bố cục charm này có sự kết hợp của những chiếc lá hình ngôi sao cắt ra và nhô cao trang trí đĩa trước, và các ngôi sao và hành tinh nổi lên mô tả một thiên hà trên đĩa sau. Giữ bí ẩn tuyệt vời của trái đất và bầu trời đêm gần bạn.', 'còn hàng', 'images/sp41.jpg'),
('C003', 'Charm Treo Pandora Moments Hình Máy Ảnh, Trái Tim Và La Bàn', 'NCC01', 600000, 'C01', 12, '\r\nDành cho những người mộng mơ và những người thích khám phá. Mang trên mình chiếc Charm Máy Ảnh, Trái Tim và La Bàn để mang theo những kỷ niệm du lịch yêu thích trên trang sức của bạn. Chiếc charm bạc này gồm một chiếc máy ảnh với viên đá lấp lánh như ống kính, một hình dạng hình trái tim với bản đồ thế giới có màu xanh lam và xanh lá và một chiếc la bàn với mũi tên chỉ hướng cố định. \"Khám phá\", \"Mơ mộng\" và \"Khám phá\" được khắc trên mặt sau của mỗi biểu tượng. Phối chúng cùng với những charm yêu thích từ những chuyến du lịch của bạn như một lời nhắc nhở để luôn luôn khám phá những điều mới mẻ.', 'hết hàng', 'images/sp42.jpg'),
('C004', 'Charm Bạc Pandora Moments Mạ Vàng Hồng 14K Trái Tim Đính Đá Hồng Ở Giữa', 'NCC02', 860000, 'C01', 12, 'Hãy lan tỏa tình yêu với charm Sparkling Leveled Hearts. Được thực hiện thủ công trong hỗn hợp kim loại độc đáo được mạ vàng hồng 14k của chúng tôi, chiếc charm này có một viên pha lê nhân tạo màu hồng hình trái tim hình trái tim ở giữa được bao bọc bởi hai vầng hào quang của khối zirconia màu hồng. Một hình trái tim cắt ra có các đặc điểm ở hai bên. Tạo nên một sự tôn vinh lấp lánh cho tình yêu và thêm nét lãng mạn cho bất kỳ bộ trang phục nào với sự quyến rũ tuyệt đẹp này. Hãy tặng chiếc bùa trái tim này cho người đặc biệt để thể hiện sự quan tâm của bạn.', 'hết hàng', 'images/sp43.jpg'),
('C005', 'Safety Chain Pandora Mạ Vàng Hồng 14k Đính Đá Trong Suốt', 'NCC01', 999000, 'C01', 12, 'Lưu giữ an toàn những kỉ niệm vô giá của bạn trên chiếc vòng Pandora Moments bằng mẫu charm khóa an toàn - safety chain chất liệu mạ vàng hồng 14k \"sang chảnh\" của chúng tôi. Tạo nét chấm phá đầy ấn tượng, mảnh ghép mạ vàng hồng 14K kết hợp cùng hàng đá Cubic Zirconia là một phụ kiện phối cực ăn ý với chiếc vòng của bạn. Chuôi xoay cuối dây xích chống rối và chiếc grips silicon ẩn phía trong đảm bao cho những hạt charm xinh xắn luôn nằm đúng vị trí của chúng.', 'còn hàng', 'images/sp44.jpg'),
('C006', 'Charm Bạc Pandora Moments Trái Tim Vô Cực Hồng', 'NCC01', 950000, 'C01', 24, 'Là một biểu tượng vô cực xung quanh trái tim đại diện cho tình yêu vĩnh cửu ràng buộc chúng ta lại với nhau; tình yêu vô lượng; liên kết sâu vô hạn giữa những người thân yêu. ', 'hết hàng', 'images/sp45.jpg'),
('C007', 'Charm Treo Pandora Moments Cây Gia Đình Màu Hồng', 'NCC03', 300000, 'C01', 24, 'Kỷ niệm trái tim của gia đình bạn với Cây gia đình màu hồng & sự quyến rũ trái tim. Sự quyến rũ lơ lửng bằng tay này được tạo ra từ Sterling Silver với một viên pha lê nhân tạo Cabochon màu hồng trong suốt có hình dạng như một trái tim. Ở mặt sau của sự treo lủng lẳng, trái tim được chấp nhận bởi một mô típ cây gia đình Openwork bằng bạc sterling, những nhánh cây được đánh bóng của nó và để tượng trưng cho một tình yêu vĩnh cửu phát triển như một cái cây và nuôi dưỡng cuộc sống mà chúng ta chạm vào. Bảo lãnh được khắc từ \"gia đình\" và được thiết lập với một viên đá zirconia màu hồng lấp lánh. Đeo nó trên chiếc vòng tay Pandora hoặc người giữ quyến rũ yêu thích để đại diện cho những người quan trọng nhất với trái tim của bạn, luôn luôn.', 'còn hàng', 'images/sp46.jpg'),
('C008', 'Charm Treo Pandora Moments Đính Đá Trái Tim Màu Hồng', 'NCC01', 850000, 'C01', 12, 'Cổ điển kết hợp hiện đại trong chiếc charm Double Halo Heart Dangle màu bạc sterling này. Nó có một viên đá trung tâm màu hồng hình trái tim được bao quanh bởi hai quầng sáng, một hình trái tim và một hình tròn. Các đường viền ở phía sau được đánh bóng để sáng bóng và phần bảo hiểm lấp lánh với một pavé zirconia hình khối. Một thiết kế để kỷ niệm tình yêu vượt thời gian của bạn.\r\n ', 'hết hàng', 'images/sp47.jpg'),
('C009', 'Charm Bạc Pandora Moments Tháng Sinh November', 'NCC02', 2000000, 'C01', 24, 'Thêm màu sắc nổi bật cho vòng tay và mặt dây chuyền của bạn với Vòng tròn quyến rũ vĩnh cửu mật ong này. Tác phẩm đặc biệt này được làm theo hình dạng của một bím tóc vô cực và được đặt bằng một viên pha lê màu mật ong ở trung tâm của nó. Tượng trưng cho sự vĩnh cửu, hãy thêm nét quyến rũ lấp lánh này vào kiểu dáng của bạn để mang đến cho trang sức hàng ngày của bạn sự tươi sáng.', 'còn hàng', 'images/sp48.jpg'),
('C010', 'Charm Pandora Moments Two-Tone Dải Ngân Hà Và Sao Băng', 'NCC01', 3000000, 'C01', 24, 'Hãy ước ao trên một ngôi sao với charm kép Ngôi Sao Băng Hai Tông. Được chế tác từ cả bạc sterling và kim loại mạ vàng hồng 14k, đây chắc chắn sẽ là một món đồ yêu thích trong số những người yêu thích móc khoá hai tông. Với lời khắc \"Love you more than all the stars in the sky\", charm ngôi sao băng này có lớp men màu xanh lấp lánh để đại diện cho một thiên hà đầy các vì sao nhấp nháy. Đĩa thứ hai của charm có mẫu hình về những ngôi sao băng với mỗi ngôi sao có một vệt cong của các viên đá lấp lánh và chi tiết hạt trang sức. Một hàng viên đá trên phần treo thêm một chút lấp lánh. Thêm một chút ánh sáng đặc biệt vào cuộc sống hàng ngày của bạn, hoặc truyền cảm hứng cho người bạn yêu luôn nỗ lực hướng đến những vì sao.', 'còn hàng', 'images/sp49.jpg'),
('DC001', 'Dây chuyền ngọc trai', 'NCC02', 100000, 'DC01', 24, 'Những viên trai mang sự liên tưởng đến sợi dây chuyền ngọc trai, mạ vàng 14K, mang tính biểu tượng và biến nó thành một thiết kế với tiềm năng cá nhân hóa vô tận. Nó có thể được phối rất nhiều kiểu,hai đầu có thể mở - được thiết kế với các đường rãnh - năm liên kết giữa mỗi đầu nối và một đầu khóa đóng mở carabiner nhỏ. Một nửa của dây là chuỗi đôi, tăng thêm khía cạnh cá nhân hóa cho dây. Bạn có thể giữ nguyên độ dài ban đầu, kéo dài hơn hoặc cũng có biến nó thành một vòng cổ, tất cả bằng cách thêm vào hoặc lấy mắt xích ra sao cho phù hợp. Khi bạn đã điều chỉnh vừa vặn, hãy phối lại nó với các charm biểu tượng đầy ý nghĩa, từ đó kể ra câu chuyện của mình', 'còn hàng', 'images/sp2.jpg'),
('DC002', 'Dây chuyền bạc mạ vàng 14K mặt tròn đính đá Cubic Zirconia', 'NCC01', 323000, 'DC01', 14, 'Nét cổ điển kết hợp hiện đại trong chiếc Vòng cổ Collier với thiết kế mặt dây chuyền Halo lấp lánh mạ vàng 14k. Với thiết kế lệch tâm độc đáo cùng chất liệu mà vàng truyền thống càng làm tăng lên sự độc nhất trong mẫu thiết kế đặc sắc này. Chiều dài dây chuyền có thể điều chỉnh được, khiến đây là một điểm nhấn linh hoạt cho trang phục của bạn.', 'Còn hàng', 'images/sp6.jpg'),
('DC003', 'Dây chuyền Pandora Moments Phủ vàng hồng 14k đính đá Cz trắng', 'NCC01', 70000, 'DC01', 14, 'Mang vẻ đẹp của thiên nhiên bên trong bộ trang sức của bạn với sợi dây chuyền Collier Cluster Cluster Sparkling.Thiết kế bao gồm những viên đá ko đồng đều một cách duyên dáng: một cụm đá hình quả lê xen kẽ với đá hình marquise, và tâm điểm là một viên đá CZ tròn, tạo hình lấy cảm hứng từ cánh hoa và lá. Một thiết kế mang hơi hướng thanh lịch từ dạng hình học mà chúng ta có thể tìm thấy bất cứ đâu trong tự nhiên, sợi dây chuyền này là sự lựa chọn hoàn hảo cho phòng cách tinh tế, nổi bật hơn của bạn.', 'Còn hàng', 'images/sp10.jpg'),
('DC004', 'Dây Chuyền Bạc Pandora Mặt Tròn Lồng Vào Nhau Đính Đá', 'NCC02', 856000, 'DC01', 12, 'Dây chuyền bạc Pandora mặt tròn lồng vào nhau và đính đá là biểu tượng của sự tinh tế và quyến rũ. Chế tác từ bạc sterling 925, mặt tròn độc đáo và rạng rỡ với đá quý nhỏ, tạo nên một trang sức thanh lịch và sang trọng. Sự kết hợp hoàn hảo giữa thiết kế hiện đại và chất lượng cao, dây chuyền này là điểm nhấn hoàn hảo cho phong cách cá nhân của bạn.', 'còn hàng', 'images/sp12.jpg'),
('DC005', 'Dây Chuyền Bạc Game Of Thrones x Pandora Mặt Hình Rồng Đính Pha Lê Đỏ', 'NCC02', 682000, 'DC01', 12, 'Dây chuyền bạc Pandora mặt tròn lồng vào nhau và đính đá là biểu tượng của sự tinh tế và quyến rũ. Chế tác từ bạc sterling 925, mặt tròn độc đáo và rạng rỡ với đá quý nhỏ, tạo nên một trang sức thanh lịch và sang trọng. Sự kết hợp hoàn hảo giữa thiết kế hiện đại và chất lượng cao, dây chuyền này là điểm nhấn hoàn hảo cho phong cách cá nhân của bạn.', 'còn hàng', 'images/sp13.jpg'),
('DC006', 'Dây Chuyền Bạc Pandora Mặt Ngôi Sao Và Mặt Trăng', 'NCC02', 900000, 'DC01', 12, 'Dây chuyền bạc Pandora với mặt ngôi sao và mặt trăng là biểu tượng của sự quyến rũ và phong cách. Chế tác từ bạc sterling 925, mặt ngôi sao và mặt trăng tạo nên một kết hợp tinh tế giữa vẻ đẹp và nghệ thuật. Chiếc dây chuyền này là sự lựa chọn hoàn hảo để thể hiện phong cách cá nhân và sự quan trọng trong mọi dịp.', 'còn hàng', 'images/sp14.jpg'),
('DC007', 'Dây Chuyền Pandora Timeles Mạ Vàng Hồng 14K Mặt Tròn Đính Đá', 'NCC02', 682000, 'DC01', 12, 'Vẻ hào nhoáng và sự hấp dẫn vượt cả thời gian của món đồ trang sức cổ truyền được thể hiện qua chiếc vòng cổ mạ vàng hồng 14K này. Từng chi tiết với mặt dây chuyển hình học nổi bật được kết hợp với khối zirconia và những hạt cườm được đính điểm trên sản phẩm. Được làm từ hỗn hợp kim loại độc nhất của chúng tôi mạ cùng vàng hồng 14K, sản phẩm trên là sự mới mẻ cho lựa chọn của bạn. Hãy chọn một chiếc vòng dây thật tinh tế để tạo nên điều kết hợp hoàn hảo', 'còn hàng', 'images/sp15.jpg'),
('DC008', 'Dây Chuyền Pandora Signature Mặt Dây Hai Vòng Tròn Đính Đá', 'NCC01', 600000, 'DC01', 12, 'Một cuộc khám phá về ý nghĩa và kiểu dáng, chiếc vòng cổ mặt dây chuyền này có thiết kế đính cườm, lát 1 lớp microbeads và logo Pandora với trái tim cắt đối ngược lại. Với các vòng tròn bên trong có thể đảo ngược và chiều dài có thể điều chỉnh, nó mang lại thêm một nét linh hoạt cho bộ sưu tập của bạn.', 'hết hàng', 'images/sp16.jpg'),
('DC009', 'Dây Chuyền Pandora Moments Mặt Chữ \\\"Mum\\', 'NCC01', 860000, 'DC01', 12, 'Tôn vinh tình mẫu tử đặc biệt mà bạn chia sẻ với mẹ bằng dây chuyền Mum Pavé của chúng tôi. Được chế tác bằng bạc đúc, tác phẩm ý nghĩa này có chữ \\\"Mum\\\" viết bằng chữ viết tay, với chữ cái giữa được hình thành như một trái tim và được đính ba viên đá nhỏ. Cố định ở giữa vòng cổ, tác phẩm này tôn vinh tất cả những người mẹ đã hình thành cuộc đời của chúng ta. Vòng cổ có khóa trượt để điều chỉnh chiều dài tùy ý. Tặng tác phẩm đặc biệt này để nhắc nhở về tình cảm mà mẹ đem lại cho bạn, và mẹ sẽ cảm nhận được tình yêu suốt cả năm.', 'hết hàng', 'images/sp17.jpg'),
('DC010', 'Dây Chuyền Bạc Pandora Signature Mạ Vàng Hồng 14k Mặt Ba Vòng Tròn', 'NCC02', 999000, 'DC01', 12, 'Đi theo hình học với mặt dây chuyền & vòng cổ hai tông màu. Được hoàn thiện thủ công bằng bạc sterling và mạ vàng hồng 14k, chiếc vòng cổ này có ba vòng quay. Vòng tròn bên ngoài bao gồm các logo Pandora ở một bên và mặt còn lại được đánh bóng; vòng tròn ở giữa mạ vàng hồng 14k có các pavé zirconia hình khối rõ ràng được đóng khung bằng hạt vi mô ở một bên và trái tim cắt ở mặt kia; vòng tròn trung tâm có khung pavé bằng hạt vi mô ở một bên và biểu tượng Pandora ở mặt sau. Các vòng tròn có thể được xoay cho tám kiểu kết hợp khác nhau.', 'còn hàng', 'images/sp18.jpg'),
('HT001', 'Hoa tai bạc hình hoa bướm', 'NCC02', 250500, 'BT01', 18, 'Được hoàn thiện thủ công bằng bạc sterling, mỗi đóa hoa Pansy có hai cánh được phủ đầy \r\nđá pavé lấp lánh và ba cánh được sơn tay bằng men màu trắng và xanh đậm, tạo nên mỗi bông hoa hoàn toàn độc đáo. Là loài hoa mới nhất xuất hiện trong vườn xuân của chúng tôi, hoa Pansy tượng trưng cho tình yêu trong nhiều hình thức khác nhau. Hãy đeo chúng như một lời nhắc nhở về tất cả những người yêu thương trong cuộc đời của bạn và phối chúng với các sản phẩm hoa Pansy khác \r\ntrong bộ sưu tập của chúng tôi để tạo ra một phong cách hài hòa.', 'Hết hàng', 'images/sp4.jpg'),
('HT002', 'Hoa tai Pandora Moments phủ vàng hồng 14k hình hoa đính đá', 'NCC01', 49000, 'BT01', 14, 'Mang vẻ đẹp của thiên nhiên bên trong bộ trang sức của bạn với bông tai nụ Herbarium Cluster.\r\nSợi dây chuyển mạ vàng hồng 14K này có một cụm đá hình quả lê xen kẽ với đá hình marquise, và tâm điểm là một viên tròn, tạo hình lấy cảm hứng từ cánh hoa và lá. Một thiết kế mang hơi hướng thanh lịch từ dạng hình học mà chúng ta có thể tìm thấy bất cứ đâu trong tự nhiên, sợi dây chuyền này là sự lựa chọn hoàn hảo cho phòng cách tinh tế, nổi bật hơn của bạn.', 'Còn hàng', 'images/sp9.jpg'),
('HT003', 'Hoa Tai Bạc Pandora Đính Đá Trái Tim', 'NCC02', 856000, 'BT01', 12, 'Là một chiếc hoa tai bạc từ thương hiệu Pandora, sản phẩm này được chế tác với chất liệu bạc cao cấp. Trên mỗi bông tai, có đính kèm một viên đá quý hình trái tim, tạo điểm nhấn sang trọng và quyến rũ. Thiết kế tỉ mỉ và độ tinh tế của hoa tai giúp nó trở thành một phụ kiện thời trang độc đáo, phù hợp để làm quà tặng hoặc làm đẹp cho bản thân. Sự kết hợp giữa chất liệu bạc và đá quý tạo nên một kiệt tác trang sức, thể hiện sự sang trọng và tinh tế.\r\n\r\n\r\n\r\n\r\n\r\n', 'còn hàng', 'images/sp19.jpg'),
('HT004', 'Hoa Tai Bạc Pandora Tròn Đính Đá Xanh', 'NCC01', 682000, 'BT01', 12, 'Hoa tai bạc Pandora tròn đính đá xanh là một tác phẩm trang sức tinh tế với chất liệu bạc cao cấp. Mỗi chiếc tai được thiết kế với hình dáng tròn mịn màng, và trang trí bằng đá quý màu xanh lá cây, tạo nên điểm nhấn sáng tạo và quyến rũ. Sự kết hợp giữa vẻ đẹp tự nhiên của đá xanh và ánh bạc lấp lánh tạo ra một sản phẩm sang trọng, phù hợp cho cả những dịp trang trí hàng ngày và những sự kiện đặc biệt. Đây là một lựa chọn thời trang độc đáo, thể hiện sự tinh tế và gu thẩm mỹ của người đeo.', 'còn hàng', 'images/sp20.jpg'),
('HT005', 'Hoa Tai Bạc Pandora Moments Họa Tiết Bím Tóc Đính Đá Pha Lê Đỏ', 'NCC01', 600000, 'BT01', 12, 'Hoa Tai Bạc Pandora Moments Họa Tiết Bím Tóc Đính Đá Pha Lê Đỏ là một chiếc tai bạc sang trọng với thiết kế độc đáo. Mỗi chiếc tai được chế tác với chất liệu bạc cao cấp và có họa tiết bím tóc tinh xảo. Điểm đặc biệt của sản phẩm là việc sử dụng đá pha lê màu đỏ, tạo nên một sự kết hợp tinh tế giữa sự quyến rũ và nét quyến rũ độc đáo. Sự tỉ mỉ trong từng đường nét của họa tiết và ánh sáng lấp lánh từ đá pha lê đỏ làm nổi bật vẻ đẹp của người đeo. Đây là một lựa chọn trang sức hoàn hảo để thể hiện phong cách và gu thẩm mỹ cá nhân.', 'hết hàng', 'images/sp21.jpg'),
('HT006', 'Hoa Tai Bạc Pandora Moments Hoa Cúc Đính Đá', 'NCC02', 860000, 'BT01', 12, 'Hoa cúc là một biểu tượng của sự khởi đầu, tự do và quả cảm. Đôi hoa tai này được thiết kế trải dài trên vành tai của bản. Đôi hoa tai bạc được chế tác thủ công này là sự kết hợp giữa hình ảnh những bông hoa cúc và nhấn nhá bằng đá Cubic Zirconia. Những chiếc hoa tai dạng hạt bắt mắt này là sự hoàn hảo nếu bạn thích phong cách phối nhiều khuyên tai, hoặc bạn cũng có thể đeo riêng lẻ từng chiếc. Hơn nữa, đây sẽ là một món quà tuyệt vời danh tặng cho người mà bạn yêu.', 'hết hàng', 'images/sp22.jpg'),
('HT007', 'Hoa Tai Bạc Pandora Moments Hình Bướm Xanh', 'NCC01', 999000, 'BT01', 12, 'Thêm cảm hứng mùa xuân vào diện mạo hàng ngày của bạn với Hoa tai vòng bướm xanh của chúng tôi với đôi cánh men vẽ bằng tay và đá zirconia hình khối rõ ràng được cắt sáng lấp lánh, mỗi con bướm là hoàn toàn độc đáo - giống như trong tự nhiên. Những con bướm đung đưa theo một góc  như thể đang bay giữa chừn, và những chiếc râu nhô cao tạo thêm nét sống động. Kỷ niệm mùa chuyển đổi và ghép những chiếc vòng này với những chiếc charm con bướm màu xanh phù hợp của chúng tôi.\r\n ', 'còn hàng', 'images/sp23.jpg'),
('HT008', 'Hoa Tai Bạc Marvel x Pandora Mạ Vàng 14K Đính Đá Vô Cực', 'NCC01', 950000, 'BT01', 24, 'Nâng tầm phong cách của bạn với đôi khuyên tai đính đá vô cực Marvel của chúng tôi. Tượng trưng cho những vật phẩm được khao khát nhất trong vũ trụ, các khuyên tai mạ vàng 14k này có sáu viên đá nhân tạo đủ màu sắc được đặt trong các hình dạng thay đổi như hình quả đào, hình tròn và hình vuông. Mỗi hình dạng được khắc viền với sức mạnh tượng trưng của viên đá của nó: \"KHÔNG GIAN\", \"SỨC MẠNH\", \"THỜI GIAN\", \"HIỆN THỰC\", \"LINH HỒN\" và \"TRÍ TUỆ\". Phối chúng cùng chiều một hướng để tạo ra một diện mạo cân bằng hoàn hảo hoặc xoay chúng để hiển thị tất cả các màu sắc của cầu vồng.', 'hết hàng', 'images/sp24.jpg'),
('HT009', 'Hoa Tai Bạc Nút Pandora Mạ Vàng Hồng 14k', 'NCC01', 300000, 'BT01', 24, 'Nhận ba lần lấp lánh với Bông Tai Nút Hình Lê Lấp Lánh. Những bông tai mạ vàng hồng 14k mỏng manh này có ba viên đá hình lê có kích thước khác nhau. Đặt trong một hàng cong từ bé đến lớn nhất, các viên đá được nối ở phần rộng hơn, tạo nên một hình dáng động đặc biệt ở những đầu, nơi các viên đá được bổ sung bởi các ngà voi hình V. Một sự tái tưởng mới mẻ về hình dáng đá cổ điển, những bông tai này có thể được kết hợp cho một dịp lịch lãm hoặc một diện mạo sáng hơn.', 'còn hàng', 'images/sp25.jpg'),
('HT010', 'Hoa Tai Bạc Pandora Treo Mạ Vàng 14k Đính Đá', 'NCC03', 850000, 'BT01', 12, 'Tạo một tuyên bố thanh lịch với Bông Tai Treo Đá Lấp Lánh Theo Dòng. Những bông tai mạ vàng 14k này có sáu viên đá lấp lánh treo thành một hàng. Viên đá đầu tiên là một viên đá nút cố định, trong khi năm viên đá còn lại được nối bởi vòng nhảy, tạo ra sự di chuyển động và lấp lánh đầy động lực. Tăng thêm sự quyến rũ trong một dịp đặc biệt với những bông tai treo thanh lịch này hoặc tặng chúng cho một người đặc biệt trong cuộc sống của bạn.', 'hết hàng', 'images/sp26.jpg'),
('N001', 'Nhẫn bạc hình vô cực', 'NCC01', 19000, 'N01', 12, 'Đắm chìm trong sự độc đáo về biểu tượng của sự vô hạn.Nút thắt mang tính biểu tượng ở phần trung tâm được đặt bất đối xứng, biểu thị sức mạnh của sự kết nối. Cặp nhẫn bạc vô cực làm từ bạc sterling này là đại diện hoàn hảo cho sự liên kết không thể phá vỡ và cũng là điểm nhấn bổ sung cho bộ sưu tập trang sức của bạn. Khi sự vô hạn là không đủ,hãy thử kết hợp cùng với những chiếc khuyên tai được lấy cảm hứng từ sự vô hạn khác để hãnh diện tạo nên tuyên ngôn của bạn', 'Còn hàng', 'images/sp1.jpg'),
('N002', 'Nhẫn kim cương vàng', 'NCC03', 779690, 'N01', 26, 'Kim cương vốn là món trang sức mang đến niềm kiêu hãnh và cảm hứng thời trang bất tận. \r\nSở hữu riêng cho mình món trang sức kim cương chính là điều mà ai cũng mong muốn. Chiếc nhẫn được chế tác từ vàng 14K cùng điểm nhấn kim cương với 57 giác cắt chuẩn xác, tạo nên món trang sức đầy sự sang trọng và đẳng cấp.Kim cương đã đẹp, trang sức kim cương lại càng mang sức hấp dẫn khó cưỡng. Sự kết hợp mới mẻ này chắc chắn sẽ tạo nên dấu ấn thời trang hiện đại và giúp quý cô trở nên nổi bật, tự tin và thu hút sự ngưỡng mộ của mọi người.', 'Còn hàng', 'images/sp5.jpg'),
('N003', 'Nhẫn bạc Pandora Moments mặt trái tim đính đá hồng pha đỏ', 'NCC02', 56700, 'N01', 15, 'Những món trang sức của chúng tôi được lấy cảm hứng từ những biểu tượng mà bạn yêu. Bạn có thể đeo chiếc nhẫn để tạo nên vẻ ngoài đặc trưng của riêng bạn hoặc mang cùng với ai đó đặc biệt và mang đến một chút ý nghĩa cho phong cách solitaire thanh lịch. Chiếc nhẫn sở hữu một viên đá Cubic Zirconia màu đỏ hình trái tim đặt trên nền bạc 925, được bao bọc bởi những viên đá nhỏ hơn. Trên thân nhẫn được chạm khắc thông điệp \"You & Me\".', 'Còn hàng', 'images/sp7.jpg'),
('N004', 'Nhẫn Pandora Moments hình hoa tuyết đính đá trắng', 'NCC03', 24000, 'N01', 36, 'Chiếc nhẫn Sparkling Herbarium Cluster gồm ba viên đá tạo hình cánh hoa làm tâm điểm, hai viên hình bầu dục và một viên hình quả lê. Được chế tác từ bạc, chiếc nhẫn thanh lịch này lấy cảm hứng từ vẻ đẹp của thiên nhiên, với tạo hình không bao giờ lỗi mốt. Có thể phối thành cặp đối xứng nhau để hoàn thiện bộ nhẫn đầy phong cách.', 'Còn hàng', 'images/sp8.jpg'),
('N005', 'Nhẫn Bạc Game Of Thrones x Pandora Hình Rồng Đính Pha Lê Đỏ Salsa', 'NCC03', 3500000, 'N01', 12, 'Hãy thử nghiệm khả năng tạo dáng của bạn với chiếc Nhẫn Rồng Rạng Ngời trong trò chơi Ngôi Nhà của Rồng. Chiếc nhẫn bạc Sterling này có một shank chồng chéo một chút được thiết kế giống hình một con rồng, với một đầu biểu thị đầu của một con rồng với hai viên đá mắt nhân tạo và đầu kia biểu thị đuôi của con rồng với bốn viên đá màu đỏ nhân tạo. Đối với những người đang tìm kiếm một mảnh trang sức thể hiện niềm đam mê của họ với Game of Thrones và đồng thời mang đến nhiều lấp lánh và quyến rũ, chiếc nhẫn rồng này là lựa chọn hoàn hảo.\r\n', 'còn hàng', 'images/sp18.jpg'),
('N006', 'Nhẫn Pandora Moments Mạ Vàng 14k Gợn Sóng Đính Đá', 'NCC02', 682000, 'N01', 12, 'Với thiết kế uốn cong như đỉnh của những con sóng vỗ, nó mang đến 1 hình dánh mới cho những thiết kế của Pandora Timeless - một sự thanh lịch bởi thiết kế mỏng gọn, tinh tế với những con sóng vượt thời gian. Những vòng sóng sáng lấp lánh bởi những viên đá CZ xếp chồng lên nhau như ánh sáng lấp lánh được phản chiếu từ mặt biển sau những con sóng dữ dội ấy. Với 3 chất liệu là bạc, rose gold plated và 14k gold plated sẽ đưa ra nhiều sự lựa chọn cho khách hàng. Nhưng có thể đeo cùng với nhau để thiết hiện đậm nét các tính của người đeo chúng.', 'còn hàng', 'images/sp27.jpg'),
('N007', 'Nhẫn Bạc Pandora Moments Mạ Vàng Hồng 14k Cách Hoa', 'NCC03', 600000, 'N01', 12, 'Chiếc nhẫn Sparkling Herbarium Cluster với tâm điểm là ba viên đá xếp hình cánh hoa, hai viên hình bầu dục và một viên hình quả lê. Đươc hoàn thiện mạ vàng 14k, chiếc nhẫn thanh lịch này lấy cảm hứng từ vẻ đẹp của thiên nhiên, với tạo hình cánh hoa không bao giờ lỗi mốt.', 'hết hàng', 'images/sp28.jpg'),
('N008', 'Nhẫn Bạc Pandora Moments Hình Thiên Thần', 'NCC03', 860000, 'N01', 12, 'Bộ sưu tập Disney kết hợp với Pandora đem đến cho chúng ta nhân vật Tinker Bell- tự tin và quả cảm cùng với thông điệp ý nghĩa \"Phép thuật thật sự nằm ở chính bạn\" rằng bất cứ con đường nào bạn chọn, khi có lòng tin chuyện tốt sẽ tới. Bởi vì mọi hành động của chúng ta đều liên quan mật thiết đến suy nghĩ và niềm tin. Pandora tin rằng Ý chí tinh thần là một điều kỳ diệu giống như bụi tiên của Tinker Bell, mang sức mạnh to lớn đưa bạn đến bất cứ nơi nào bạn muốn chỉ cần có niềm tin. Qua thiết kế chi tiết bắt mắt của chiếc nhẫn hay vòng đeo tay, khiến nó trông giống như Tinker Bell bay xung quanh ngón tay. cổ tay của bạn và để lại dấu vết bụi tiên ma thuật ở đó.', 'hết hàng', 'images/sp29.jpg'),
('N009', 'Nhẫn Bạc Marvel x Pandora Họa Tiết Baby Groot', 'NCC03', 999000, 'N01', 12, 'Hãy khám phá người anh hùng bên trong chính mình với chiếc nhẫn Marvel Guardians of the Galaxy Baby Groot của chúng tôi. Hoàn thiện bằng tay bằng bạc sterling, chiếc nhẫn này có hình ảnh gương mặt tươi cười của Groot ở giữa và lá quanh dải nhẫn. Để tăng độ sâu và lấp lánh, đôi mắt của Groot được trang trí bằng men đen được bôi tay và bốn chiếc lá được đính bằng cubic zirconia trong suốt. \"Tôi LÀ GROOT\" - điều duy nhất mà Groot nói được khắc trên bên trong dải nhẫn. Thêm chiếc nhẫn này vào bộ sưu tập của bạn như một biểu tượng cho khả năng của bạn để mạnh mẽ hơn mỗi ngày.', 'còn hàng', 'images/sp30.jpg'),
('N010', 'Nhẫn Bạc Pandora Timeless Viền Đính Đá', 'NCC03', 950000, 'N01', 24, 'Cùng thêm vào bộ sưu tập của bạn với chiếc nhẫn Pandora Timeless Pavé Single-row đầy lấp lánh và thời thượng. Được chế tác từ bạc sterling và hoàn thiện thủ công, chiếc nhẫn này có một hàng đá cubic zirconia trong suốt ở giữa và một hàng đối xứng trên hai bên, tạo thành một hình vuông với góc cạnh nhẹ nhàng và toả sáng từ mọi góc nhìn. Bạn có thể mix nó với các sản phẩm Timeless Pavé khác để tạo ra phong cách minimalist hay maximalist tùy ý.', 'hết hàng', 'images/sp31.jpg'),
('VT001', 'Vòng tay bạc dạng chuỗi', 'NCC02', 300000, 'VT01', 12, 'Làm mới phong cách của bạn với Vòng tay \"Sparkling Halo\". Được hoàn thiện thủ công bằng hợp kim bạc. Tác phẩm lung linh này được tạo nên từ những viên đá lấp lánh. Một viên đá lớn được bao quanh bởi vô số viên đá cubic zirconia trong suốt nhiều kích thước tạo nên 1 vầng hào quang ngay vị trí trung tâm. Với chốt khóa hình móc câu thuận tiện khi sử dụng và rât an toàn, sự có mặt của viên đá nhỏ lấp lánh ở cuối vòng tạo sự sinh động. \r\nHãy tạo nên phong các riêng của bạn với Timeless, sự lung linh cổ điển mà nổi bật.', 'Còn hàng', 'images/sp3.jpg'),
('VT002', 'Bộ Vòng Charm Pandora Họa Tiết Hình Trái Tim Và Ổ Khóa', 'NCC02', 9000000, 'VT01', 12, 'Bộ vòng charm Pandora với họa tiết hình trái tim và ổ khóa là một biểu tượng tinh tế của tình yêu và ý nghĩa. Chế tác từ bạc sterling 925, mỗi charm độc đáo kể một câu chuyện riêng, trong khi ổ khóa thể hiện sự kết nối và ý nghĩa đặc biệt. Với thiết kế đẹp mắt và chất lượng, bộ vòng này là một cách tuyệt vời để thể hiện phong cách và giữ lại những kỷ niệm quan trọng', 'còn hàng', 'images/sp11.jpg'),
('VT003', 'Vòng Kiếng Disney x Pandora Nhân Vật Stitch', 'NCC02', 300000, 'VT01', 24, 'Vòng kiếng được chế tác với chất liệu chất lượng cao, có thể là bạc sterling, và có thể được trang trí với hình ảnh và chi tiết nhỏ của Stitch. Với tính cách ngộ nghĩnh và đáng yêu, sản phẩm này có thể là một lựa chọn tuyệt vời cho những người yêu thích Disney và muốn thể hiện sự cá nhân qua trang sức của mình. Vòng kiếng có thể được sử dụng như một món quà ý nghĩa hoặc làm điểm nhấn thú vị cho bộ sưu tập trang sức của người đeo.', 'còn hàng', 'images/sp32.jpg'),
('VT004', 'Vòng Bạc Marvel x Pandora Mạ Vàng 14k Đính Đá Nhiều Màu', 'NCC01', 9900000, 'VT01', 12, 'Đeo sự hâm mộ của bạn với đầy màu sắc với Vòng Marvel The Avengers Infinity Stones. Vòng cổ mạ vàng 14k thuộc bộ sưu tập Marvel x Pandora với đá pha lê nhiều màu được tạo ra bằng công nghệ và các dấu chấm đáng ý. Biểu tượng hóa sáu viên Ngọc Vô Cực từ The Avengers, các viên đá pha lê được đặt trong khung bằng các hình dạng khác nhau, với mỗi viên có một màu sắc và thông điệp riêng biệt: đỏ (\"REALITY\"), cam (\"SOUL\"), vàng (\"MIND\"), xanh lá cây (\"TIME\"), tím (\"POWER\") và xanh lam (\"SPACE\"). Vòng cổ Marvel x Pandora này là sản phẩm không thể thiếu cho các fan của Marvel.', 'còn hàng', 'images/sp33.jpg'),
('VT005', 'Vòng Bạc Pandora Timeless Dạng Chuỗi Đính Đá Xanh', 'NCC01', 3590000, 'VT01', 12, 'Nâng tầm phong cách của bạn với vòng tay Pavé Bars lấp lánh. Được hoàn thiện thủ công bằng hợp kim bạc, thiết kế này được lấy cảm hứng từ những mảnh ghép lâu đời của Pandora. Đặc biệt chiếc vòng được trang hoàng bằng những viên đá nhỏ trong suốt được đính kết lại với nhau tạo thành một liên kết vững chắc giữa những viên lớn hơn màu xanh lam, chiếc vòng tay bao gồm một chốt cài có dây treo được đính đá ở cuối . Có thể điều chỉnh kích thước, tông màu lạnh của chiếc vòng được bù đắp bởi các miếng mạ vàng hồng 14k được hoàn thiện bằng tay.', 'còn hàng', 'images/sp34.jpg'),
('VT006', 'Vòng Tay Bạc Mạ Vàng Hồng 14k Pandora Signature Đính Đá Trong Suốt', 'NCC02', 600000, 'VT01', 12, 'Tạo ra phong cách của bạn với Vòng Đeo Tay Chuỗi Pandora Signature Two Two-tone Logo & Pavé. Được chế tác từ bạc sterling và có lớp phủ vàng hồng 14k, chiếc vòng đeo tay chuỗi này có một họa tiết tròn hai tông ở giữa, được tô điểm bởi một dãy đá lung linh và hạt siêu nhỏ ở giữa. Phần sau được mài bóng và hai bên của nó được khắc hai biểu tượng Pandora. Chi tiết vòng D mở phía sau, họa tiết có thể xoay tự do theo mọi chuyển động của bạn. Được coi là món đồ thiết yếu trong mọi bộ sưu tập, phong cách này đang trở thành chiếc vòng đeo tay làm việc chăm chỉ nhất của bạn.', 'hết hàng', 'images/sp35.jpg'),
('VT007', 'Vòng Bạc Pandora Cụm Herbarium Hình Tròn', 'NCC01', 860000, 'VT01', 12, 'Lấy cảm hứng từ những hình dáng tuyệt đẹp của thiên nhiên với chiếc vòng tay Sparkling Herbarium Cluster Chain Bracelet. Được lấy cảm hứng từ những bông hoa và lá cọp được ép, chiếc vòng tay bằng bạc sterling này được hoàn thiện thủ công và được trang trí với các viên đá cubic zirconia hình tròn và hình marquise xen kẽ dọc theo một nửa của chuỗi, với hai cụm đá hình tròn, hình marquise và hình lê tạo ra những hình dáng lấy cảm hứng từ thiên nhiên, được kết nối với nhau bằng những miếng ghép linh hoạt. Vòng tay có thể điều chỉnh được đến ba kích thước khác nhau. Tôn lên phong cách của bạn với chiếc vòng tay thanh lịch này như một lời nhắc về vẻ đẹp của thiên nhiên.', 'hết hàng', 'images/sp36.jpg'),
('VT008', 'Vòng Pandora Timeless Mạ Vàng Hồng Đính Đá Hồng', 'NCC03', 999000, 'VT01', 12, 'Mang đến sự sang trọng cho trang phục của bạn với Vòng tay Tennis Pavé lấp lánh. Được hoàn thiện thủ công bằng hỗn hợp kim loại độc đáo mạ vàng hồng 14k của chúng tôi, chiếc vòng tay tennis này được trang trí bằng những viên pha lê nhân tạo màu hồng phong lan lấp lánh. Một tảng đá lớn hình trái tim ở giữa làm thủng một dãy các gian hàng có kích thước đều nhau. Vòng đeo tay bao gồm một móc khóa để đóng an toàn và có thể được điều chỉnh theo ba độ dài. Tạo kiểu cho nó với các mảnh Pandora Timeless lung linh khác để có một cái nhìn cổ điển và nổi bật.', 'còn hàng', 'images/sp37.jpg'),
('VT009', 'Vòng Pandora Moments Mạ Vàng 14k Khóa Crown O', 'NCC03', 950000, 'VT01', 24, 'Lấp lánh trong từng khoảng khắc với chiếc vòng Pandora Moments Sparkling Crown O Snake Chain Bracelet. Được chế tác tủ công từ chất liệu Pandora Shine (hợp kim mạ vàng 18k đặc biệt), phần nút gài của chiếc vòng có biểu tượng Pandora crown O lồng ghép quen thuộc cùng những viên đá cubic zirconia rực rỡ, uyển chuyển. Chiếc vòng này mang đến cho bạn một vẻ đẹp thanh lịch và thời thượng nơi cổ tay. Hãy kết hợp snake chain cùng với những chiếc bracelet khác, thêm vào một vài mẫu charm yêu thích và biến nó trở thành món phụ kiện \"vượt thời gian\".', 'hết hàng', 'images/sp38.jpg'),
('VT010', 'Vòng Da Đôi Pandora Moments Màu Đen', 'NCC03', 300000, 'VT01', 24, 'Vòng Da Đôi Pandora Moments Màu Đen là một cặp vòng da chất lượng cao được thiết kế đặc biệt cho cả nam và nữ. Chúng có thể làm từ chất liệu da tự nhiên, có màu đen tinh tế và bền bỉ. Thiết kế có thể đơn giản và thanh lịch, phản ánh tinh thần thương hiệu Pandora với sự tập trung vào chất lượng và phong cách.', 'còn hàng', 'images/sp39.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `ID_USER` int(5) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASS` varchar(50) NOT NULL,
  `TYPE_USER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`ID_USER`, `NAME`, `EMAIL`, `PASS`, `TYPE_USER`) VALUES
(1, 'daotrinh27', 'daothitrinh@gmail.com', '27112000!', 'Customer'),
(2, 'thaovu26', 'vuthithao@gmail.com', 'thaoxinhgai2615', 'Administration'),
(3, 'hungle68', 'hunglee@gmail.com', 'lmao686868', 'Administration'),
(4, 'maia12', 'anhmai@gmail.com', 'anhmaideptrai1212', 'Administration'),
(5, 'lythao1', 'vuthaoly@gmail.com', 'healingchualanh', 'Customer'),
(6, 'thanhnam3', 'thanhnam@gmail.com', 'chiyeuminhem', 'Customer'),
(7, 'cute23', 'cute23@gmail.com', 'quacute23', 'Customer'),
(8, 'idea20', 'hetytuong@gmail.com', 'biideaquata', 'Customer'),
(9, 'quoctoan123', 'quoctoan123@gmail.com', 'ngaonghet1con', 'Customer'),
(10, 'hunggia26', 'truongnguyengiahung@gmail.com', 'top1yasuovietnam', 'Administration'),
(11, 'baotram22', 'baotram@gmail.com', 'nguyenngocbaotram2204', 'Administration'),
(12, 'linhle2', 'linhlee@gmail.com', 'youbelongtome/', 'Customer'),
(13, 'haiduy21', 'buiduyhai@gmail.com', 'iahyudiub1004', 'Administration'),
(14, 'tanle666', 'tanngocle@gmail.com', 'tanledinhcao!', 'Administration'),
(15, 'socola2', 'lovechocolate@gmail.com', 'songchidean!', 'Customer'),
(16, 'thieulan', 'thieulan@gmail.com', 'doyoufeelthelove?', 'Customer'),
(17, 'phucdoan', 'doannhuphuc@gmail.com', 'love_yourself', 'Administration'),
(18, 'cady452', 'cady452@gmail.com', 'maiyeusasuke<3', 'Customer'),
(19, 'thpain', 'manwithpain@gmail.com', 'loveisabeautifulpain.', 'Customer'),
(20, 'trangnguyen2', 'nguyenthithutrang@gmail.com', 'gamelachanaicuocdoi', 'Customer'),
(21, 'lmao11', 'lmao1@gmail.com', '1111111111111', 'Customer'),
(22, 'nguyenmai14', 'anhnguyen142@gmail.com', 'fifaimaidinh11', 'Administration');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_cus`
--

CREATE TABLE `users_cus` (
  `ID_CUS` varchar(5) NOT NULL,
  `ID_USER` int(5) NOT NULL,
  `FIRSTNAME_CUS` varchar(50) NOT NULL,
  `LASTNAME_CUS` varchar(50) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `EMAIL_CUS` varchar(50) NOT NULL,
  `ADDRESS_CUS` varchar(200) NOT NULL,
  `PHONE_CUS` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users_cus`
--

INSERT INTO `users_cus` (`ID_CUS`, `ID_USER`, `FIRSTNAME_CUS`, `LASTNAME_CUS`, `GioiTinh`, `EMAIL_CUS`, `ADDRESS_CUS`, `PHONE_CUS`) VALUES
('KH001', 1, 'Đào', 'Thị Trinh', 1, 'daothitrinh@gmail.com', '113 Nguyễn Trãi,Nha Trang, Khánh Hòa', '0369524887'),
('KH002', 5, 'Vũ', 'Thảo Ly', 1, 'vuthaoly@gmail.com', '22 Cẩm Đông, Cẩm Phả, Quảng Ninh', '0345698223'),
('KH003', 6, 'Nguyễn', 'Thành Nam', 0, 'thanhnam@gmail.com', '81A Đ. Hùng Vương, Phường 9,Đà Lạt, Lâm Đồng', '0369514789'),
('KH004', 7, 'Phạm', 'Thị Liên', 1, 'cute23@gmail.com', '176 Âu Cơ, Tiến Thành, Phan Thiết, Bình Thuận', '0321546987'),
('KH005', 8, 'Lê', 'Hoài Đức', 0, 'hetytuong@gmail.com', 'Điện Dương, Điện Bàn, Quảng Nam', '0321546987'),
('KH006', 9, 'Đinh', 'Quốc Toàn', 0, 'quoctoan123@gmail.com', '364 Quang Trung, Đậu Liên, Hồng Lĩnh, Hà Tĩnh', '0321556987'),
('KH007', 12, 'Lê', 'Lưu Linh', 1, 'linhlee@gmail.com', '294 Quang Trung, Đậu Liên, Hồng Lĩnh, Hà Tĩnh', '0345698745'),
('KH008', 15, 'Hoàng', 'Khắc Liêm', 0, 'lovechocolate@gmail.com', '92 Nguyễn Phong Sắc, Hưng Dũng, Vinh, Nghệ An', '0345698745'),
('KH009', 16, 'Diệp', 'Thiếu Lan', 1, 'lovechocolate@gmail.com', '764 Lý Bôn, Trần Lâm, Thái Bình', '0796314588'),
('KH010', 18, 'Lý', 'Tiểu Long', 0, 'cady452@gmail.com', 'Số 127 Đường số 6, Đông Hải 1, Hải An, Hải Phòng', '0756999777'),
('KH011', 19, 'Đỗ', 'Nam Trung', 0, 'manwithpain@gmail.com', 'Đường số 5, khu dân cư Genimex, Tân Uyên, Bình Dương', '0255648971'),
('KH012', 20, 'Nguyễn', 'Thị Thu Trang', 1, 'nguyenthithutrang@gmail.com', '86 P. Nguyễn Văn Tuyết, Trung Liệt, Đống Đa, Hà Nội', '0753951654'),
('KH13', 21, 'Trọng', 'Trần Đức', 0, 'lmao1@gmail.com', 'Nha Trang', '0123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_employeer`
--

CREATE TABLE `users_employeer` (
  `ID_EMP` varchar(5) NOT NULL,
  `ID_USER` int(5) NOT NULL,
  `ID_DEP` varchar(5) NOT NULL,
  `ID_POS` varchar(5) NOT NULL,
  `FIRSTNAME_EMP` varchar(50) NOT NULL,
  `LASTNAME_EMP` varchar(50) NOT NULL,
  `GioiTinh` tinyint(1) NOT NULL,
  `EMAIL_EMP` varchar(50) NOT NULL,
  `ADDRESS_EMP` varchar(200) NOT NULL,
  `PHONE_EMP` varchar(11) NOT NULL,
  `QUYEN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users_employeer`
--

INSERT INTO `users_employeer` (`ID_EMP`, `ID_USER`, `ID_DEP`, `ID_POS`, `FIRSTNAME_EMP`, `LASTNAME_EMP`, `GioiTinh`, `EMAIL_EMP`, `ADDRESS_EMP`, `PHONE_EMP`, `QUYEN`) VALUES
('EMP01', 2, 'D01', 'P03', 'Vũ', 'Thị Thảo', 1, 'vuthithao@gmail.com', 'Lô 19A Chợ, Vĩnh Hải, Nha Trang, Khánh Hòa', '0369547896', 'Chỉ được xem'),
('EMP02', 3, 'D04', 'P01', 'Lê', 'Gia Hưng', 0, 'hunglee@gmail.com', '91 Đặng Tất, Vĩnh Hải, Nha Trang, Khánh Hòa', '0389165478', 'Được chỉnh sửa'),
('EMP03', 4, 'D04', 'P01', 'Nguyễn', 'Thị Mai Anh', 1, 'anhmai@gmail.com', '86 Trần Phú, Nha Trang, Khánh Hòa', '03965874111', 'Được chỉnh sửa'),
('EMP04', 10, 'D04', 'P01', 'Trương', 'Nguyễn Gia Hưng', 0, 'truongnguyengiahung@gmail.com', '01 Trần Phú, Nha Trang, Khánh Hò', '0369258147', 'Được chỉnh sửa'),
('EMP05', 11, 'D02', 'P03', 'Nguyễn', 'Ngọc Bảo Trâm', 1, 'baotram@gmail.com', '01 Lê Đại Hành, Nha Trang, Khánh Hòa', '0359877123', 'Chỉ được xem'),
('EMP06', 13, 'D03', 'P04', 'Bùi', 'Duy Hải', 0, 'buiduyhai@gmail.com', '22 Đặng Tất, Nha Trang, Khánh Hòa', '0359877123', 'Chỉ được xem'),
('EMP07', 14, 'D04', 'P03', 'Lê', 'Ngọc Tân', 0, 'tanngocle@gmail.com', '56 Bình Tân, Nha Trang, Khánh Hòa', '0359877569', 'Được chỉnh sửa'),
('EMP08', 17, 'D04', 'P03', 'Đoàn', 'Như Phục', 0, 'doannhuphuc@gmail.com', '125 đường 23/10, Nha Trang, Khánh Hòa', '0369147258', 'Được chỉnh sửa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`ID_CTHD`),
  ADD KEY `ID_HD` (`ID_HD`);

--
-- Chỉ mục cho bảng `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID_DEP`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID_GH`),
  ADD KEY `GIOHANG FK_USERS_CUS` (`ID_CUS`),
  ADD KEY `GIOHANG FK_SAN_PHAM` (`ID_TS`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID_HD`),
  ADD KEY `ID_CUS` (`ID_CUS`),
  ADD KEY `ID_TS` (`ID_TS`);

--
-- Chỉ mục cho bảng `loaitrangsuc`
--
ALTER TABLE `loaitrangsuc`
  ADD PRIMARY KEY (`ID_LOAITS`);

--
-- Chỉ mục cho bảng `ncc`
--
ALTER TABLE `ncc`
  ADD PRIMARY KEY (`ID_NCC`);

--
-- Chỉ mục cho bảng `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`ID_POS`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID_TS`),
  ADD KEY `ID_NCC` (`ID_NCC`),
  ADD KEY `ID_LOAITS` (`ID_LOAITS`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Chỉ mục cho bảng `users_cus`
--
ALTER TABLE `users_cus`
  ADD PRIMARY KEY (`ID_CUS`),
  ADD KEY `ID_USER` (`ID_USER`);

--
-- Chỉ mục cho bảng `users_employeer`
--
ALTER TABLE `users_employeer`
  ADD PRIMARY KEY (`ID_EMP`),
  ADD KEY `ID_USER` (`ID_USER`),
  ADD KEY `ID_DEP` (`ID_DEP`),
  ADD KEY `ID_POS` (`ID_POS`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID_GH` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `ID_USER` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `CTHD FK_HOADON` FOREIGN KEY (`ID_HD`) REFERENCES `hoadon` (`ID_HD`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `GIOHANG FK_SAN_PHAM` FOREIGN KEY (`ID_TS`) REFERENCES `sanpham` (`ID_TS`),
  ADD CONSTRAINT `GIOHANG FK_USERS_CUS` FOREIGN KEY (`ID_CUS`) REFERENCES `users_cus` (`ID_CUS`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `HOADON FK_SANPHAM` FOREIGN KEY (`ID_TS`) REFERENCES `sanpham` (`ID_TS`),
  ADD CONSTRAINT `HOADON FK_USERS_CUS` FOREIGN KEY (`ID_CUS`) REFERENCES `users_cus` (`ID_CUS`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `SANPHAM FK_LOAITRANGSUC` FOREIGN KEY (`ID_LOAITS`) REFERENCES `loaitrangsuc` (`ID_LOAITS`),
  ADD CONSTRAINT `SANPHAM FK_NCC` FOREIGN KEY (`ID_NCC`) REFERENCES `ncc` (`ID_NCC`);

--
-- Các ràng buộc cho bảng `users_cus`
--
ALTER TABLE `users_cus`
  ADD CONSTRAINT `USERS_CUS FK_USERS` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`);

--
-- Các ràng buộc cho bảng `users_employeer`
--
ALTER TABLE `users_employeer`
  ADD CONSTRAINT `USERS_EMP FK_DEPARTMENT` FOREIGN KEY (`ID_DEP`) REFERENCES `department` (`ID_DEP`),
  ADD CONSTRAINT `USERS_EMP FK_USERS` FOREIGN KEY (`ID_USER`) REFERENCES `users` (`ID_USER`),
  ADD CONSTRAINT `USER_EMP FK_POSITION` FOREIGN KEY (`ID_POS`) REFERENCES `position` (`ID_POS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
