-- Alternative SQL script for Free Parking Slots in case we need to count for individual slots
-- Tested on MS SQL Server 2012 by Toni Niittymäki 
-- Uses database 'FreeParkingSlots'

USE FreeParkingSlots;
GO

-- Drop Tables, if not null
IF OBJECT_ID('SlotVacancy') IS NOT NULL
	DROP TABLE SlotVacancy;

IF OBJECT_ID('ParkingSlot') IS NOT NULL
	DROP TABLE ParkingSlot;

IF OBJECT_ID('ParkingArea') IS NOT NULL
	DROP TABLE ParkingArea;

IF OBJECT_ID('Campus') IS NOT NULL
	DROP TABLE Campus;
GO

-- Create tables
CREATE TABLE Campus
(
	CampusId			TINYINT		IDENTITY(1,1)	PRIMARY KEY,
	CampusNameFinnish	VARCHAR(20)	NOT NULL,
	CampusNameEnglish	VARCHAR(20)	NOT NULL
);
GO

-- Individual areas within campus
CREATE TABLE ParkingArea
(
	PAreaId				TINYINT		IDENTITY(1,1)	PRIMARY KEY,
	PAreaNameFinnish	VARCHAR(20)	NOT NULL,
	PAreaNameEnglish	VARCHAR(20)	NOT NULL,
	NumberOfSlots		SMALLINT	NOT NULL,
	SlotsOccupied		SMALLINT	NOT NULL		DEFAULT (0),
	IsFull				BIT			NOT NULL		DEFAULT (0),
	CampusId			TINYINT		NOT NULL,
	CONSTRAINT FK_ParkingArea_Campus FOREIGN KEY 
	(CampusId) REFERENCES Campus (CampusId)
);
GO

-- Individual slots within parking area
CREATE TABLE ParkingSlot
(
	PSlotId		SMALLINT	IDENTITY(1,1)	PRIMARY KEY,
	PAreaId		TINYINT		NOT NULL,
	IsVacant	BIT			NOT NULL		DEFAULT(1),
	CONSTRAINT FK_ParkingLot_ParkingArea FOREIGN KEY 
	(PAreaId) REFERENCES ParkingArea (PAreaId)
);
GO	

-- Table to hold information about slots' vacancy
CREATE TABLE SlotVacancy
(
	SlotVacancyId	BIGINT		IDENTITY(1,1)	PRIMARY KEY,
	PSlotId			SMALLINT	NOT NULL,
	ArrTime			DATETIME,
	DepTime			DATETIME,
	CONSTRAINT FK_SlotVacancy_ParkingSlot FOREIGN KEY 
	(PSlotId) REFERENCES ParkingSlot (PSlotId)
);
GO

-- Inserting some sample values to test
INSERT INTO Campus (CampusNameFinnish, CampusNameEnglish) VALUES
('Kalevantie', 'Kalevantie'),
('Kuntokatu', 'Kuntokatu'),
('Hervanta', 'Herwood'); 
GO

INSERT INTO ParkingArea (PAreaNameFinnish, PAreaNameEnglish, NumberOfSlots, CampusId) VALUES
('Etuparkki', 'Park at Front', 32, 1),
('Takaparkki', 'Park at Back', 50, 2),
('Pysäköintitalo', 'Carage', 100, 3);
GO

INSERT INTO ParkingSlot (PAreaId) VALUES
(1),
(1),
(1),
(1),
(1),
(1),
(1),
(1);
GO

INSERT INTO SlotVacancy (PSlotId, ArrTime, DepTime) VALUES
(1, '2016-01-16 12:32:00.000', '2016-01-16 12:45:00.000'),
(1, '2016-01-16 12:55:00.000', '2016-01-16 16:32:00.000'),
(2, '2016-01-16 12:55:00.000', '2016-01-16 16:32:00.000'), 
(2, '2016-01-17 12:55:00.000', '2016-01-17 16:32:00.000'),
(2, '2016-01-18 12:55:00.000', NULL),
(3, '2016-01-16 12:55:00.000', '2016-01-16 16:32:00.000'),
(4, '2016-01-16 12:55:00.000', '2016-01-16 16:32:00.000'),
(5, '2016-01-16 12:55:00.000', '2016-01-16 16:32:00.000');
GO

-- Sample queries
SELECT *
FROM Campus;
GO

SELECT *
FROM ParkingArea;
GO

SELECT *
FROM ParkingSlot;
GO

SELECT *
FROM SlotVacancy;
GO

SELECT C.*, PA.*, PS.*, SV.*
FROM Campus C
	JOIN ParkingArea PA ON C.CampusId = PA.CampusId
	JOIN ParkingSlot PS ON PA.PAreaId = PS.PAreaId
	JOIN SlotVacancy SV ON PS.PSlotId = SV.PSlotId;  
GO

-- Testing some triggers
CREATE TRIGGER updateVacancyOnArrival
ON SlotVacancy
AFTER INSERT
AS
BEGIN
	DECLARE @PSlotId SMALLINT
	SET @PSlotId = (SELECT PSlotId FROM inserted)
	
	UPDATE ParkingSlot
		SET isvacant = 0
		WHERE PSlotId = @PSlotId
END
GO

CREATE TRIGGER updateVacancyOnDeparture
ON SlotVacancy
AFTER UPDATE
AS
BEGIN
	DECLARE @PSlotId SMALLINT
	SET @PSlotId = (SELECT PSlotId FROM deleted)
	
	UPDATE ParkingSlot
		SET isvacant = 1
		WHERE PSlotId = @PSlotId
END
GO

-- MISSING TRIGGERS TO UPDATE ParkingArea Table (SlotsOccupied, IsFull)
-- ????
