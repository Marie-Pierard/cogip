INSERT INTO cogit.cogit_type
    (Type)
VALUES
    ('Customer'),
    ('Provider')
;

INSERT INTO cogit.cogit_country
    (Country)
VALUES
    ('United State'),
    ('France'),
    ('Belgique'),
    ('Italie'),
    ('England'),
    ('China')
;

INSERT INTO cogit.cogit_company
    (Name, Tva, idCountry, idType)
VALUES
    ('Raviga', 'US456 654 342', 1, 1),
    ('Dunder Mifflin', 'US678 765 765', 1, 1),
    ('Jouet Jean-Michel', 'FR 677 544 000', 2, 1),
    ('Bob Vance Refrig', 'US456 654 687', 1, 1),
    ('Belgalol', 'BE0876 654 665', 3, 2),
    ('Pierre Cailloux', 'FR 678 908 654', 2, 2),
    ('Proximdr', 'BE876 985 665', 3, 2),
    ('ElectricPower', 'IT 256 852 542', 4, 2),
    ('Mutiny', 'EN 125 794 364', 5, 1),
    ('Hooli', 'IT 951 357 000', 4, 2),
    ('Phoque Off', 'CH147 349 862', 6, 2),
    ('Pied Piper', 'EN 234 657 842', 5, 1)
;

INSERT INTO cogit.cogit_contact
    (LastName, FirstName, Phone, Email, idCompany)
VALUES
    ('Gregory', 'Peter', '555-4567', 'peter.gregory@raviga.com', 1),
    ('Schrute', 'Dwight', '555-9859', 'dwight.schrute@ddmfl.com', 2),
    ('Howe', 'Cameron', '555-7896', 'cam.howe@mutiny.net', 9),
    ('Belson', 'Galvin', '555-4213', 'gavin@hooli.com', 10),
    ('Yang', 'Jian', '555-4567', 'jian.yang@phoqe.off', 11),
    ('Gilfoyle', 'Bertram', '555-0987', 'gilfoyle@piedpiper.com', 12)
;

INSERT INTO cogit.cogit_invoice
    (NumberInvoice, date, idCompany)
VALUES
    ('F20190404-004', '2019-04-04', 3),
    ('F20190404-003', '2019-04-04', 2),
    ('F20190404-002', '2019-04-04', 6),
    ('F20190404-001', '2019-04-04', 12),
    ('F20190403-654', '2019-04-03', 1),
    ('F20180414-008', '2018-04-14', 2),
    ('F20180408-002', '2018-08-04', 6),
    ('F20180407-001', '2018-04-07', 12),
    ('F20180403-654', '2018-04-03', 1),
    ('F20180404-004', '2018-04-04', 3),
    ('F20170404-003', '2017-04-04', 2),
    ('F20170404-002', '2017-04-04', 6),
    ('F20170404-001', '2017-04-04', 12),
    ('F20170403-654', '2017-04-03', 1)
;