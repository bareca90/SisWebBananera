CREATE VIEW VSP_seg_aplicacion 
AS
SELECT 	acc.seg_acc_cab_fecha,
			acc.seg_usu_codigo,
			usu.seg_usu_nombres,
			usu.seg_usu_usuario,
			pera.seg_apl_codigo,
			apl.seg_apl_descripcion,
			apl.seg_apl_archivo,
			apl.seg_apl_tipo,
			apl.seg_apl_orden,
			apl.seg_apl_id_padre
FROM seg_accesos acc
INNER JOIN seg_usuario usu
ON		acc.seg_usu_codigo = usu.seg_usu_codigo
JOIN 	seg_perfil per
ON 	acc.seg_per_codigo = per.seg_per_codigo
JOIN 	seg_perfil_aplicacion pera
ON		per.seg_per_codigo	=	pera.seg_per_codigo
JOIN	seg_aplicacion apl
ON		pera.seg_apl_codigo	=	apl.seg_apl_codigo