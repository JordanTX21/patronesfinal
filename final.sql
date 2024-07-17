-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 16-07-2024 a las 21:51:53
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `final`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `productos`
-- 

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL auto_increment,
  `descripcion` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `productos`
-- 

INSERT INTO `productos` VALUES (1, 'prod1', '2024-07-16', 12.00, 12);
INSERT INTO `productos` VALUES (3, 'Producto A', '2023-01-01', 100.00, 50);
INSERT INTO `productos` VALUES (4, 'Producto B', '2023-01-02', 120.50, 30);
INSERT INTO `productos` VALUES (5, 'Producto C', '2023-01-03', 80.75, 20);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `ventas`
-- 

CREATE TABLE `ventas` (
  `nro_factura` int(11) NOT NULL auto_increment,
  `item` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigo_producto` int(11) NOT NULL,
  `descripcion_producto` varchar(255) NOT NULL,
  `unidad_medida` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `igv` decimal(10,2) NOT NULL,
  PRIMARY KEY  (`nro_factura`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `ventas`
-- 

INSERT INTO `ventas` VALUES (1, 1, '2023-01-05', 1, 'Producto A', 'unidad', 2, 18.00);
INSERT INTO `ventas` VALUES (2, 2, '2023-01-05', 1, 'Producto B', 'unidad', 3, 27.15);
INSERT INTO `ventas` VALUES (3, 1, '2023-01-07', 3, 'Producto A', 'unidad', 5, 45.00);
INSERT INTO `ventas` VALUES (4, 2, '2023-01-07', 1, 'Producto C', 'unidad', 1, 9.50);
