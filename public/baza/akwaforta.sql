-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Sty 2018, 22:36
-- Wersja serwera: 10.1.21-MariaDB
-- Wersja PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `akwaforta`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `src` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `images`
--

INSERT INTO `images` (`id`, `product_id`, `src`, `created_at`) VALUES
(2, 2, 'draw-2303845_640.jpg', '2017-12-18 15:44:22'),
(3, 3, 'brush-2725695_640.jpg', '2017-12-18 15:49:30'),
(4, 16, 'dfg.jpg', '2017-12-27 18:04:28'),
(5, 5, 'paper-571938_640.jpg', '2017-12-18 18:09:02'),
(6, 17, 'k.jpg', '2017-12-27 18:04:28'),
(9, 23, '5305_0.jpg', '2017-12-19 22:49:29'),
(10, 24, '0512a80daddca5155800e810220a3c93.jpg', '2017-12-27 16:26:56'),
(11, 4, 'colored-pencils-686679_640.jpg', '2017-12-27 17:27:32'),
(12, 18, 'notebook-1587527_640.jpg', '2017-12-27 17:27:38'),
(13, 14, 'post-it-notes-2836842_640.jpg', '2017-12-27 17:34:36'),
(14, 21, 'oil-paints-260023_640.jpg', '2017-12-27 17:34:36'),
(15, 22, 'acrylic-paints-174638_640.jpg', '2017-12-27 17:34:40'),
(16, 12, 'markers-1859936_640.jpg', '2017-12-27 17:34:40'),
(17, 11, 'colors-1267035_640.jpg', '2017-12-27 17:40:52'),
(18, 7, 'portfolio-385530_640.jpg', '2017-12-27 17:40:52'),
(19, 20, 'i-pentel-marker-n850-czarny.jpg', '2017-12-27 17:41:01'),
(20, 19, 'colored-pencils-175263_640.jpg', '2017-12-27 17:41:01'),
(21, 6, 'd7e905667d688bd339f31f4afcdea80f.jpg', '2017-12-27 17:50:59'),
(22, 8, 'sdf.jpg', '2017-12-27 17:50:59'),
(23, 9, 'i-charbonnel-farba-graficzna-200ml-black.jpg', '2017-12-27 17:54:31'),
(24, 10, 'tusz-kalkograficzny-nr-02-medium-transparentne.jpg', '2017-12-27 17:54:31'),
(25, 13, 'walki.jpg', '2017-12-27 18:01:00'),
(26, 15, 'glitter-1967767_640.jpg', '2017-12-27 18:01:00'),
(40, 38, 'e70047e7ee4de41d5e8a659943768d3a.jpg', '2018-01-10 21:18:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `total_price`) VALUES
(63, 9, 'wysłano', '2018-01-10 20:32:38', 14),
(64, 9, 'wysłano', '2018-01-11 14:07:18', 6),
(65, 9, 'w realizacji', '2018-01-15 21:22:11', 2),
(66, 9, 'w realizacji', '2018-01-15 21:31:06', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(29, 63, 23, 2),
(30, 64, 3, 2),
(31, 65, 2, 1),
(32, 66, 2, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `colour`, `size`, `description`, `price`) VALUES
(2, 'Ołówek \"Handle\"', 'rysunek', 'grafit', '9B - 9H', 'Najwyższej wytrzymałości i jakości ołówki rysunkowe z naturalnego grafitu, przeznaczone są do kreślenia, szkicowania i rysowania,zasięg twardości jest przedstawiony w stopniach: od miękkiego do twardego ( od 9B do 9H), co gwarantuje pełne pokrycie rysunków i szkiców.', '2,10 zł'),
(3, 'Pędzel \"Aero\"', 'malarstwo', 'brak', '2-24', 'Doskonałe okrągłe pędzle syntetyczne z serii 601 przeznaczone do malowania farbami akrylowym, akwarelowymi, temperą oraz gwaszem zadowolą profesjonalistów oraz amatorów. Włosie tych pędzli jest miękkie, sprężyste, dobrze absorbuje wodę, przenosi pigment oraz pozwala gładko i jednolicie nałożyć farbę. Rozmiary: 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 24.', '3,70 zł'),
(4, 'Zestaw kredek \"Rainbow\"', 'rysunek', 'rózne', '12 sztuk', 'W opinii użytkowników to najlepsze dostępne na rynku kredki posiadające grafit na bazie wosku. Duża zawartość wysokiej jakości pigmentów zapewnia intensywność kolorów oraz wysoką światłotrwałość - prace wykonane tymi kredkami nie zbledną, mimo ciągłej ekspozycji na światło dzienne lub sztuczne.Kredki nie łamią się ani w czasie strugania, ani rysowania.', '68,70 zł'),
(5, 'Papier w arkuszach', 'papiery', 'różne', '100x70cm', 'Karton kolorowy 220g/m², barwiony w masie w 22 kolorach o lekko gładzonej powierzchni. Karton polecany do rysowania, wycinania, prac manualnych oraz zadruku offsetowego i cyfrowego. Papier jest bezkwasowy, bezdrzewny, posiada wysoką odporność na blaknięcie.', '3,10 zł'),
(6, 'Wstążka', 'decupage', 'złoty', 'rolka 2m', 'Satynowa, połyskująca wstążka o szerokości 3 cm. Może być wykorzystana do zdobienia przy decupage.', '5'),
(7, 'Teczka kartonowa', 'teczki', 'tektura', 'B3, A3', 'Wykonana z dobrej jakości grubej szarej tektury teczka do przechowywaniai przenoszenia prac rysunkowych. Grubość materiału wynosi 2,5mm, co zapewnia ochronę i bezpieczeństwo transportowanych prac. Wewnątrz teczkiznajdują się zakładki. \r\nProdukt posiada również wyciętą rączkę, która ułatwia noszenie. \r\nDostępna w formatach B3 i A3.', '7,30 zł'),
(8, 'Tuba plastikowa stała', 'teczki', 'czarny, srebrny', 'Śr.:65 mm\r\nDł.:52cm', 'Bardzo dobrej jakości tuba na rysunki i obrazy firmy Leniar, służy do przechowywania i transportowania prac. To ekonomiczne rozwiązanie, które zagwarantuje ich ochronę przed zniszczeniem, zakurzeniem, poplamieniem, pomięciem się, a także przed niekorzystnymi warunkami pogodowymi.', '12,90 zł'),
(9, 'Farba graficzna', 'grafika', 'różne', '60 ml', 'Farby graficzne – drukarskie  \r\nFarby Charbonnel produkowane są na bazie oleju, przy wykorzystaniu pigmentów w 95% pochodzenia syntetycznego. Farby Charbonnel stosowane są przy technikach takich jak akwaforta, akwatinta, linoryt.     \r\n', '32,90 zł'),
(10, 'Tusz kalkograficzny do druku', 'grafika', 'brak', '60 ml', 'Tusze olejne wysokiej jakości, tłuste.  Opracowane specjalnie do technik graficznych, szczególnie do wklęsłodruku i wypukłodruku. Bardzo dobrze się łączą, więc można mieszać ze sobą dowolne odcienie. Rozrzedzane są olejem.', '8,50 zł'),
(11, 'Pisak pędzelkowy \"Line\"', 'kaligrafia', 'szary, czarny', 'brak', 'Pisak z końcówką pędzelkową z tuszem na bazie wody produkcji francuskiej firmy. Profesjonalne, spełniające wysokie standardy i bardzo chętnie wybierane przez artystów. Elastyczne, miękkie, ale jednocześnie wytrzymałe końcówki zostały stworzone z doskonałej jakości poliestru. Są w stanie kreślić cienkie i precyzyjne linie, szybko kolorować większe obszary lub rysować linie o zmiennej grubości, oferując wachlarz różnorodnych rezultatów.', '6,50 zł'),
(12, 'Pisak Identi Pen Sakura', 'kaligrafia', 'różne', 'brak', 'Seria Identi-Pen to wyjątkowe pisaki do ogólnego stosowania z dwoma fibrowymi końcówkami bardzo dobrej jakości. \r\nKońcówki posiadają dwa rozmiary: cieńsza końcówka jest perfekcyjna do detali i wąskich linii, można swobodnie nią pisać, a druga nadaje się do kreślenia grubych, śmiałych linii i kolorowania większych obszarów. ', '6,50 zł'),
(13, 'Zestaw 3 wałków gąbkowych', 'decupage', 'rew', '2,5cm, 4cm, 6cm', 'Wałki gąbkowe przeznaczone do celów hobbystycznych i dekoratorskich, dobrej jakości i w niskiej cenie. Nadają się do pokrywania farbą płótna, kartonu, powierzchni drewnianych, kamiennych, do wykonywania wzorów, do gruntowania i wielu innych zastosowań. Wałki cechują się dobrym wchłanianiem i przenoszeniem farby oraz świetnie rozprowadzają farbę. Malują gładko, nie pozostawiają smug. Wałki są lekkie i poręczne.', '10,50 zł'),
(14, 'Nożyczki do decoupage i scrapbboking', 'decupage', 'brak', '10,5 cm', 'Nożyczki 10,5 cm z nierdzewnej stali idealne do decoupage i scrapbboking , precyzyjne końcówki zakończone szpicem.Uchwyty z tworzywa w kolorze czarnym, opakowanie indywidualne.', '10,50 zł'),
(15, 'Brokat sypki', 'decupage', 'złoty, srebrny, niebeski', '25 g', 'Brokat sypki w słoiczku z łatwością nada magicznego charakteru ozdabianym przedmiotom. Swoim migoczącym blaskiem upiększy świąteczne dekoracje takie jak łańcuchy, zawieszki choinkowe, bombki, girlandy, kokardy, a także przyozdobi prezenty. Sprawdzi się w ozdabianiu własnoręcznie wykonanych kartek okolicznościowych, dyplomów, wizytówek. ', '2,50 zł'),
(16, 'Taśma dwustronna', 'decupage', 'biała', '15mm x 10m', 'Dwustronna taśma samoprzylepna MILAN. Szerokość: 15 mm. Długość: 10 m. Taśma pokryta z obu stron klejem i zabezpieczona warstwą papieru. Kolor: biały. Bardzo dobrze przylega do powierzchni.', '5,50 zł'),
(17, 'Gumka chlebowa', 'rysunek', 'szary', '2,50x3 cm', 'Poręczna gumka do mazania wysuwana mechanicznie. Posiada mechanizm grawitacyjny. Kolorowa, wytrzymała plastikowa oprawka posiada klip, dzięki któremu produkt można przyczepić np. do podkładki. Gumka przeznaczona do ołówków średnich twardości. Dobrze wyciera, jest odpowiednia do wymazywania detali.', '3,70 zł'),
(18, 'Szkicownik \"Enter\"', 'rysunek', 'kremowy', 'A4', 'Szkicownik na spirali w formacie A4 posiada 100 arkuszy kremowego papieru o gramaturze 80g. Okładka z kolorowego papieru pochodzącego z recyklingu, z tyłu tekturka. Papier perforowany', '35,80 zł'),
(19, 'Talens Ecoline zestaw 5 pisaków', 'markery', 'różne', '5 sztuk', 'Pisak Ecoline jest bardzo łatwy w użyciu i zastosowaniu, doskonale przylega do kartonu, papieru do akwareli. Koncentrat farby wodnej (akwareli) w formie płynnej w poręcznej pisaku o pędzelkowej końcówce. W ofercie dostępnych jest 29 kolorów plus blender. Ecoline jest ponadto bardzo wszechstronny i oprócz szerokiego zastosowania w kreatywnych formach hobby jest również używany w szkolnictwie. Prace powinny być przechowywane z dala od światła aby zapobiec utracie kolorów.', '40,50 zł'),
(20, 'Markery do drewna', 'markery', 'czarny', '15mm', 'Markery ZIG Woodcraft Stain 15mm zawierają wodny, szybkoschnący tusz, dzięki temu są idealne do malowania, dekorowania oraz pisania na drewnie. Bardzo pomocne w robieniu zabawek, dekorowaniu domków dla lalek oraz sztuki ludowej. Wysoki stopnień krycia pozwala na zamalowywanie kolorów spodnich warstw.', '22,90 zł'),
(21, 'Farby olejne Oil Colour', 'malarstwo', 'różne', '120ml', 'Bardzo dobrej jakości farby olejne doskonałe do celów szkolnych, edukacyjnych oraz dla artystów posiadających różne stopnie doświadczenia. Te farby znanej firmy Phoenix cechują się znakomitą głębią i klarownością kolorów. Są wyraziste, trwałe i odporne na działanie promieni słonecznych oraz światła dzięki temu, iż zostały wyprodukowane na bazie starannie dobranych pigmentów.', '8,50 zł'),
(22, 'Farby wodne do ceramiki', 'malarstwo', 'biały, czarny, zielony', '60ml', 'Idea Ceramica to seria profesjonalnych farb dedykowanych do malowania i dekorowania ceramiki, szkła, terakoty oraz glazury. Paleta barw obejmuje 18 dobrze kryjących, żywych kolorów, które można dowolnie ze sobą mieszać, dzięki czemu uzyskamy nowe, wyjątkowe odcienie. Farby są wodorozcieńczalne, płynne, łatwe w aplikacji, gładko rozprowadzają się po malowanej powierzchni. Szybko wysychają (ok. 1 godziny), a kolory nie tracą na intensywności.', '17,10 zł'),
(23, 'Dłuto do linoleum', 'grafika', 'czarny', '2,3,5,8', 'Seria 12 dłut do linorytu z hartowanej stali połączonych termicznie z rączką z włókna szklanego, dodatkowo wzmocnionych okuciem z mosiądzu. \r\nPrzystępna cena sprawia, że te dłuta są idealne dla studentów i uczniów szkół plastycznych. Długość całkowita to 13cm, w tym 3,5cm części zasadniczej. Wymiary podane w milimetrach. ', '7,50 zł'),
(24, 'Blok do akwareli \"Light\"', 'papiery', 'biały, kremowy', 'A5, A4, A3', 'Papier do wszystkich technik wodnych polecany szczególnie do akwareli. Masa papieru 300 g/m², Papier bezkwasowy wykonany z celulozy zawiera w sobie 15% bawełny. Kolor biały, papier z delikatną fakturą (10 arkuszy)', '6'),
(38, 'Farby akrylowe', 'malarstwo', 'różne', '24 tubki', 'Zestaw zawiera 24 farby w tubkach o pojemności 12 ml. Farby Art Creation Expression stworzono na bazie wyselekcjonowanych, wyjątkowych pigmentów. Gama barw obejmuje intensywne, najczęściej używane kolory, zarówno odcienie ciepłe, jak i zimne. Farby charakteryzuje świetna mieszalność (w dowolnych proporcjach), dzięki czemu można uzyskać nowe, unikatowe kolory, co poszerzy spektrum barw o znacznie więcej odcieni, niż dostępne w komplecie 24 odcienie. ', '35 zł'),

(50, 'Procesor Intel Core i3-8350K, 4GHz, 8MB, BOX (BX80684I38350K)', 'procesory', 'x', 'x', 'Taktowanie: 4GHz \nRdzenie/Wątki: 4/4 \nTyp gniazda: Socket 1151 (Coffee Lake)', '846 zł' ),
(51, 'Procesor Intel Core i5-9600K, Hexa Core, 3.7GHz, 9MB,14mn, BOX (BX80684I59600K)', 'procesory', 'x', 'x', 'Taktowanie: 3,7-4,6GHz \nRdzenie/Wątki: 6/6 \nTyp gniazda: Socket 1151 (Coffee Lake)', '1199 zł'),
(52, 'Procesor Intel Core i7-8700K, Hexa Core, 3.70GHz, 12MB, LGA1151, 14nm, BOX (BX80684I78700K)', 'procesory', 'x', 'x', 'Taktowanie: 3,7-4,7GHz \nRdzenie/Wątki: 6/12 \nTyp gniazda: Socket 1151 (Coffee Lake)', '1999 zł'),
(53, 'Procesor Intel Core i9-9960X, 3.1GHz, 22 MB, BOX (BX80673I99960X)', 'procesory', 'x', 'x', 'Taktowanie: 3,1-4,5GHz \nRdzenie/Wątki: 16/32 \nTyp gniazda: Socket 2066', '8532 zł'),

(60, 'Płyta główna MSI B360M PRO-VDH', 'plyty_glowne', 'x', 'x', 'Chipset płyty: Intel B360 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: Micro ATX', '319 zł'),
(61, 'Płyta główna Gigabyte Z370 AORUS Gaming K3', 'plyty_glowne', 'x', 'x', 'Chipset płyty: Intel Z370 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: ATX', '489 zł'),
(62, 'Płyta główna Asus ROG MAXIMUS XI HERO', 'plyty_glowne', 'x', 'x', 'Chipset płyty: Intel Z390 \nGniazdo procesora: Socket 1151 (Coffee Lake) \nStandard pamięci: DDR4 \nStandard płyty: ATX', '1447 zł'),
(63, 'Płyta główna MSI MEG X299 CREATION', 'plyty_glowne', 'x', 'x', 'Chipset płyty: Intel X299 \nGniazdo procesora: Socket 2066 \nStandard pamięci: DDR4 \nStandard płyty: Extended ATX', '2439 zł'),

(70, 'Karta graficzna MSI GTX 1050 Ti Aero ITX OCV1 4GB GDDR5 (128 bit), HDMI, DP, DVI_D, BOX', 'karty_graficzne', 'x', 'x', 'VRAM: 4GB \nSzyna danych[bit]: 128 \nTyp złącza: PCI Express x16 \nŁączenie kart: Nie', '769 zł'),
(71, 'Karta graficzna MSI GeForce GTX 1060 GAMING X 6GB GDDR5 192 Bit 3xDP, HDMI, DVI-D, BOX', 'karty_graficzne', 'x', 'x', 'VRAM: 6GB \nSzyna danych[bit]: 192 \nTyp złącza: PCI Express x16 \nŁączenie kart: Nie', '1319 zł'),
(72, 'Karta graficzna Zotac GeForce GTX 1070 Ti AMP! Edition 8GB GDDR5 (256 bit) DVI-D, HDMI, 3xDP, BOX', 'karty_graficzne', 'x', 'x', 'VRAM: 8GB \nSzyna danych[bit]: 256 \nTyp złącza: PCI Express 3.0 \nŁączenie kart: SLI', '2345 zł'),
(73, 'Karta graficzna Zotac GeForce RTX 2080 Ti AMP Edition, GDDR6, HDMI, 3xDP, USB-C, BOX', 'karty_graficzne', 'x', 'x', 'VRAM: 11GB \nSzyna danych[bit]: 352 \nTyp złącza: PCI Express x16 \nŁączenie kart: SLI', '6099 zł'),

(80, 'Pamięć Kingston HyperX DDR4 (HX421X14FBK2/8)', 'pamiec_ram', 'x', 'x', 'Pojemność: 8GB \nCzęstotliwość pracy [MHz]: 2133 \nOpóźnienie: CL14', '306 zł'),
(81, 'Pamięć Corsair Vengeance LPX, DDR4 (CMK16GX4M2B3000C15)', 'pamiec_ram', 'x', 'x', 'Pojemność: 16GB \nCzęstotliwość pracy [MHz]: 3000 \nOpóźnienie: CL15', '552 zł'),
(82, 'Pamięć G.Skill Ripjaws V, DDR4 (F4-3200C16D-32GVKA)', 'pamiec_ram', 'x', 'x', 'Pojemność: 32GB \nCzęstotliwość pracy [MHz]: 3200 \nOpóźnienie: CL16', '1925 zł'),
(83, 'Pamięć G.Skill Trident Z RGB, DDR4 (F4-3733C17Q2-64GTZR)', 'pamiec_ram', 'x', 'x', 'Pojemność: 64GB \nCzęstotliwość pracy [MHz]: 3733 \nOpóźnienie: CL17', '5043 zł'),

(90, 'Zasilacz SilentiumPC Vero L2 600W', 'zasilacze', 'x', 'x', 'Moc[W]: 600 \nCertyfikat sprawności: 80 Plus Bronze \nModularne okablowanie: Nie', '209 zł'),
(91, 'Zasilacz Corsair RMx Series RM650x 650W, 80 PLUS Gold, modularny, 140mm', 'zasilacze', 'x', 'x', 'Moc[W]: 650 \nCertyfikat sprawności: 80 PLUS Gold \nModularne okablowanie: W pełni modularny', '455 zł'),
(92, 'Zasilacz be quiet! Dark Power Pro P11 850W', 'zasilacze', 'x', 'x', 'Moc[W]: 850 \nCertyfikat sprawności: 80 PLUS Platinum \nModularne okablowanie: Pół modularny', '818 zł'),
(93, 'Zasilacz Thermaltake Toughpower iRGB PLUS 1250W (PS-TPI-1250DPCTEU-T)', 'zasilacze', 'x', 'x', 'Moc[W]: 1250 \nCertyfikat sprawności: 80 Plus Titanium \nModularne okablowanie: W pełni modularny', '1361 zł'),

(100, 'Obudowa SilentiumPC Regnum RG2 Pure Black', 'obudowy', 'x', 'x', 'Kompatybilność: Mini ATX, Mini ITX, ATX, Micro ATX (uATX) \nTyp obudowy: Midi Tower \nZłącza USB: USB 3.0 x2', '129 zł'),
(101, 'Obudowa Nzxt H500 okno, biały (CA-H500B-W1)', 'obudowy', 'x', 'x', 'Kompatybilność: Mini ITX, ATX, Micro-ATX/Mini-ITX \nTyp obudowy: Midi Tower \nZłącza USB: USB 3.0 x2', '405 zł'),
(102, 'Obudowa IN WIN 301, zasilacz 450W, czarny (301PSU BLACK)', 'obudowy', 'x', 'x', 'Kompatybilność: Mini ITX, Micro ATX (uATX) \nTyp obudowy: Mini Tower \nZłącza USB: USB 3.0 x2', '561 zł'),
(103, 'Obudowa IN WIN 909 (909 BLACK)', 'obudowy', 'x', 'x', 'Kompatybilność: Mini ITX,ATX, Micro ATX (uATX), Extended ATX (e-ATX) \nTyp obudowy: Full Tower \nZłącza USB: USB 3.0 x3', '1831 zł'),

(110, 'Dysk Toshiba P300 (HDWD120UZSVA)', 'dyski_ssd', 'x', 'x', 'Pamięć podręczna: 64MB \nPojemność dysku: 2TB \nFormat dysku: 3.5\"', '265 zł'),
(111, 'Dysk Seagate FireCuda 2.5\" 2TB (ST2000LX001)', 'dyski_ssd', 'x', 'x', 'Pamięć podręczna: 128MB \nPojemność dysku: 2TB \nFormat dysku: 2.5\"', '414 zł'),
(112, 'Dysk SSD Samsung 860 PRO 512GB SATA3 (MZ-76P512B/EU)', 'dyski_ssd', 'x', 'x', 'Pamięć podręczna: b.d. \nPojemność dysku: 512GB \nFormat dysku: 2.5\"', '789 zł'),
(113, 'Dysk SSD Plextor M8SeY Series 1TB, PCIe 3.0 x4 NVMe (PX-1TM8SeY)', 'dyski_ssd', 'x', 'x', 'Pamięć podręczna: b.d. \nPojemność dysku: 1024GB \nFormat dysku: PCIe', '1921 zł'),

(120, 'Chłodzenie CPU be quiet! Pure Rock (BK009)', 'chlodzenie', 'x', 'x', 'Gniazdo procesora: Socket 1150, Socket 1151, Socket 1155, Socket 1156, Socket 1356, Socket 2011, Socket 2011-3', '138 zł'),
(121, 'Chłodzenie CPU be quiet! Dark Rock 4 PRO BK022', 'chlodzenie', 'x', 'x', 'Gniazdo procesora: Socket 1150, Socket 1151, Socket 1155, Socket 1156, Socket 1356, Socket 2011, Socket 2011-3', '317 zł'),
(122, 'Chłodzenie wodne Corsair H150i PRO 360mm (CW-9060031-WW)', 'chlodzenie', 'x', 'x', 'Gniazdo procesora: AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+, LGA2011-3, LGA1151, LGA11...', '755 zł'),
(123, 'Chłodzenie wodne Nzxt Kraken X62 v.2 (RL-KRX62-02)', 'chlodzenie', 'x', 'x', 'Gniazdo procesora: AM2, AM2+, AM3, AM3+, FM1, FM2, FM2+, LGA2011-3, LGA1151, LGA11...', '618 zł');


----------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` enum('seller','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `firstname`, `lastname`, `phone`, `address`, `role`) VALUES
(1, 'pomaranska@mail.com', 'adminola', 'a', 'Aleksandra\r\n', 'Pomarańska', '600700800', 'Rzeszów 5, 38-190 Rzeszów', 'seller'),
(2, 'adamski@mail.com', 'adamski', 'ad', 'Michał', 'Adamski', '123456789', 'Korczyna 21, Korczyna 38-210', 'customer'),
(3, 'kovalsky@mail.com', 'kovalsky', 'kovalsky', 'Dominik', 'Kovalsky', '900800700', 'Kolbuszowa 1, Kolbuszowa 38-300', 'customer'),
(4, 'maciej@mail.com', 'maciej', 'maciej', 'Maciej', 'Wiliński', '233345678', 'Rzeszów 2, Rzeszów 38-200', 'customer'),
(5, 'jolanta@mail.com', 'jolanta', 'jolanta', 'Jolanta', 'Bilińska', '345789087', 'Orzechów 3, Orzechów 39-400', 'customer'),
(6, 'janek@mail.com', 'janek', 'janek', 'Jan', 'Nowak', '345567900', 'Sieklówka 3, Sieklówka 30-400', 'customer'),
(7, 'lisowski@mail.com', 'ferdynand', 'fer', 'Ferdynand', 'Lisowski', '678900213', 'Olechów 5, 38-123 Olechów', 'customer'),
(8, 'kblonska@mail.com', 'klaudia', 'klaudia', 'Klaudia', 'Błońska', '990890566', 'Rzeszów 7, 38-190 Rzeszów ', 'customer'),
(9, 'karska@mail.com', 'ilona', 'a', 'Ilona', 'Karska', '778900555', 'Nowaków 4, 34-209 Nowaków', 'customer'),
(10, 'joannaz@mail.com', 'asia', 'asia', 'Joanna', 'Słowińska', '123567890', 'Zielonka 3, ul. Zielona 21, Zielonów 30-400', 'customer');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT dla tabeli `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
