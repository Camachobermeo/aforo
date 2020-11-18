-- Table: public.video

-- DROP TABLE public.video;

CREATE TABLE public.video
(
  id_video serial NOT NULL,
  url_video character varying,
  CONSTRAINT pkkk PRIMARY KEY (id_video),
  CONSTRAINT video_url_video_key UNIQUE (url_video)
);
CREATE TABLE public.logo
(
  id_logo serial NOT NULL,
  url_logo character varying,
  CONSTRAINT pk_logo PRIMARY KEY (id_logo),
  CONSTRAINT logo_url_logo_key UNIQUE (url_logo)
);

CREATE TABLE public.totem
(
  id_totem serial NOT NULL,
  codigo character varying,
  descripcion character varying,
  direccion character varying,
  CONSTRAINT pk_totem PRIMARY KEY (id_totem),
  CONSTRAINT totem_codigo_key UNIQUE (codigo)
);
