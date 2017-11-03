CREATE OR REPLACE FUNCTION sumaDonaciones(id_fondo integer) RETURNS integer AS $$
    DECLARE suma INTEGER;

BEGIN
    SELECT SUM(monto) INTO suma
    FROM donacion D
    WHERE D.id_fondos = id_fondo;

    RETURN suma;
END

$$ LANGUAGE plpgsql;

CREATE OR REPLACE FUNCTION actualizarFondo() RETURNS trigger AS $$
	DECLARE id_fondo INTEGER;
    DECLARE resultado INTEGER;

BEGIN
    SELECT D.id_fondos INTO id_fondo
    FROM donacion D
    ORDER BY D.id_donacion DESC
    LIMIT 1;
    
    SELECT sumaDonaciones(id_fondo) INTO resultado;
    UPDATE fondo F
    SET monto = resultado
    WHERE F.id_fondos = id_fondo;
    RETURN NULL;
END

$$ LANGUAGE plpgsql;

DROP TRIGGER triggerdonacion ON donacion;

CREATE TRIGGER triggerdonacion
    AFTER INSERT 
    ON donacion
    FOR EACH ROW
    EXECUTE PROCEDURE actualizarfondo();