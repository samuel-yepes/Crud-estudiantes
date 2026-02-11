--
-- PostgreSQL database dump
--

-- Dumped from database version 15.4
-- Dumped by pg_dump version 15.4

-- Started on 2026-02-11 15:44:56

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 220 (class 1259 OID 251638)
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 251646)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 251672)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 251671)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3410 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 224 (class 1259 OID 251664)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 251655)
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 251654)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.jobs_id_seq OWNER TO postgres;

--
-- TOC entry 3411 (class 0 OID 0)
-- Dependencies: 222
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 215 (class 1259 OID 251605)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 251604)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 3412 (class 0 OID 0)
-- Dependencies: 214
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 218 (class 1259 OID 251622)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 251629)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 251684)
-- Name: student; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.student (
    id bigint NOT NULL,
    nombre character varying(255) NOT NULL,
    correo character varying(255) NOT NULL,
    edad character varying(255) NOT NULL,
    telefono character varying(255) NOT NULL,
    lenguaje character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    foto character varying(255)
);


ALTER TABLE public.student OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 251683)
-- Name: student_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.student_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.student_id_seq OWNER TO postgres;

--
-- TOC entry 3413 (class 0 OID 0)
-- Dependencies: 227
-- Name: student_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.student_id_seq OWNED BY public.student.id;


--
-- TOC entry 217 (class 1259 OID 251612)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 251611)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 3414 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 3216 (class 2604 OID 251675)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 3215 (class 2604 OID 251658)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 3213 (class 2604 OID 251608)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 3218 (class 2604 OID 251687)
-- Name: student id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student ALTER COLUMN id SET DEFAULT nextval('public.student_id_seq'::regclass);


--
-- TOC entry 3214 (class 2604 OID 251615)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 3396 (class 0 OID 251638)
-- Dependencies: 220
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 3397 (class 0 OID 251646)
-- Dependencies: 221
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 3402 (class 0 OID 251672)
-- Dependencies: 226
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 3400 (class 0 OID 251664)
-- Dependencies: 224
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 3399 (class 0 OID 251655)
-- Dependencies: 223
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 3391 (class 0 OID 251605)
-- Dependencies: 215
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2026_02_05_185920_create_student_table	1
5	2026_02_10_205934_foto_estudiantes	2
\.


--
-- TOC entry 3394 (class 0 OID 251622)
-- Dependencies: 218
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 3395 (class 0 OID 251629)
-- Dependencies: 219
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
MxvV9I7MjwyAfMYYLtctruiRgKFFLWvsSidUP2Fc	\N	127.0.0.1	Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36	YTozOntzOjY6Il90b2tlbiI7czo0MDoiRHRmRG9kSXpKUjJteUhaQ05aUHRyd0E2Ukd1UVVXSGllbE4wYzBZOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czoxNzoiZXN0dWRpYW50ZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19	1770841919
\.


--
-- TOC entry 3404 (class 0 OID 251684)
-- Dependencies: 228
-- Data for Name: student; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.student (id, nombre, correo, edad, telefono, lenguaje, created_at, updated_at, foto) FROM stdin;
2	María Gómez	maria2@gmail.com	19	3001000002	Java	\N	\N	\N
3	Carlos Ruiz	carlos3@gmail.com	20	3001000003	Python	\N	\N	\N
4	Ana Torres	ana4@gmail.com	21	3001000004	JavaScript	\N	\N	\N
5	Luis Martínez	luis5@gmail.com	22	3001000005	C#	\N	\N	\N
6	Laura Sánchez	laura6@gmail.com	18	3001000006	PHP	\N	\N	\N
7	Pedro Ramírez	pedro7@gmail.com	19	3001000007	Java	\N	\N	\N
8	Sofía Herrera	sofia8@gmail.com	20	3001000008	Python	\N	\N	\N
9	Andrés López	andres9@gmail.com	21	3001000009	JavaScript	\N	\N	\N
10	Valentina Cruz	valentina10@gmail.com	22	3001000010	C#	\N	\N	\N
11	Estudiante 11	est11@gmail.com	18	3001000011	PHP	\N	\N	\N
12	Estudiante 12	est12@gmail.com	19	3001000012	Java	\N	\N	\N
13	Estudiante 13	est13@gmail.com	20	3001000013	Python	\N	\N	\N
14	Estudiante 14	est14@gmail.com	21	3001000014	JavaScript	\N	\N	\N
15	Estudiante 15	est15@gmail.com	22	3001000015	C#	\N	\N	\N
16	Estudiante 16	est16@gmail.com	18	3001000016	PHP	\N	\N	\N
17	Estudiante 17	est17@gmail.com	19	3001000017	Java	\N	\N	\N
18	Estudiante 18	est18@gmail.com	20	3001000018	Python	\N	\N	\N
19	Estudiante 19	est19@gmail.com	21	3001000019	JavaScript	\N	\N	\N
20	Estudiante 20	est20@gmail.com	22	3001000020	C#	\N	\N	\N
21	Estudiante 21	est21@gmail.com	18	3001000021	PHP	\N	\N	\N
22	Estudiante 22	est22@gmail.com	19	3001000022	Java	\N	\N	\N
23	Estudiante 23	est23@gmail.com	20	3001000023	Python	\N	\N	\N
24	Estudiante 24	est24@gmail.com	21	3001000024	JavaScript	\N	\N	\N
25	Estudiante 25	est25@gmail.com	22	3001000025	C#	\N	\N	\N
26	Estudiante 26	est26@gmail.com	18	3001000026	PHP	\N	\N	\N
27	Estudiante 27	est27@gmail.com	19	3001000027	Java	\N	\N	\N
28	Estudiante 28	est28@gmail.com	20	3001000028	Python	\N	\N	\N
29	Estudiante 29	est29@gmail.com	21	3001000029	JavaScript	\N	\N	\N
30	Estudiante 30	est30@gmail.com	22	3001000030	C#	\N	\N	\N
31	Estudiante 31	est31@gmail.com	18	3001000031	PHP	\N	\N	\N
32	Estudiante 32	est32@gmail.com	19	3001000032	Java	\N	\N	\N
33	Estudiante 33	est33@gmail.com	20	3001000033	Python	\N	\N	\N
34	Estudiante 34	est34@gmail.com	21	3001000034	JavaScript	\N	\N	\N
35	Estudiante 35	est35@gmail.com	22	3001000035	C#	\N	\N	\N
36	Estudiante 36	est36@gmail.com	18	3001000036	PHP	\N	\N	\N
37	Estudiante 37	est37@gmail.com	19	3001000037	Java	\N	\N	\N
38	Estudiante 38	est38@gmail.com	20	3001000038	Python	\N	\N	\N
39	Estudiante 39	est39@gmail.com	21	3001000039	JavaScript	\N	\N	\N
40	Estudiante 40	est40@gmail.com	22	3001000040	C#	\N	\N	\N
41	Estudiante 41	est41@gmail.com	18	3001000041	PHP	\N	\N	\N
42	Estudiante 42	est42@gmail.com	19	3001000042	Java	\N	\N	\N
43	Estudiante 43	est43@gmail.com	20	3001000043	Python	\N	\N	\N
44	Estudiante 44	est44@gmail.com	21	3001000044	JavaScript	\N	\N	\N
45	Estudiante 45	est45@gmail.com	22	3001000045	C#	\N	\N	\N
46	Estudiante 46	est46@gmail.com	18	3001000046	PHP	\N	\N	\N
47	Estudiante 47	est47@gmail.com	19	3001000047	Java	\N	\N	\N
48	Estudiante 48	est48@gmail.com	20	3001000048	Python	\N	\N	\N
49	Estudiante 49	est49@gmail.com	21	3001000049	JavaScript	\N	\N	\N
50	Estudiante 50	est50@gmail.com	22	3001000050	C#	\N	\N	\N
1	Juan Pérez	juan1@gmail.com	20	3001000001	PHP	\N	2026-02-11 20:30:40	\N
66	samuel isaac yepes molina	syepesa@gmail.com	20	12354678	Javal	2026-02-11 20:27:24	2026-02-11 20:31:15	estudiantes/5HIeRzN6Di2a7e1XPQFkMwQcimIRtnUaTQySCHVm.jpg
\.


--
-- TOC entry 3393 (class 0 OID 251612)
-- Dependencies: 217
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 3415 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 3416 (class 0 OID 0)
-- Dependencies: 222
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 3417 (class 0 OID 0)
-- Dependencies: 214
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 5, true);


--
-- TOC entry 3418 (class 0 OID 0)
-- Dependencies: 227
-- Name: student_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.student_id_seq', 66, true);


--
-- TOC entry 3419 (class 0 OID 0)
-- Dependencies: 216
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 3236 (class 2606 OID 251652)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 3233 (class 2606 OID 251644)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 3243 (class 2606 OID 251680)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3245 (class 2606 OID 251682)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 3241 (class 2606 OID 251670)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 3238 (class 2606 OID 251662)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 3220 (class 2606 OID 251610)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 3226 (class 2606 OID 251628)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 3229 (class 2606 OID 251635)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 3247 (class 2606 OID 251691)
-- Name: student student_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.student
    ADD CONSTRAINT student_pkey PRIMARY KEY (id);


--
-- TOC entry 3222 (class 2606 OID 251621)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 3224 (class 2606 OID 251619)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 3231 (class 1259 OID 251645)
-- Name: cache_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_expiration_index ON public.cache USING btree (expiration);


--
-- TOC entry 3234 (class 1259 OID 251653)
-- Name: cache_locks_expiration_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX cache_locks_expiration_index ON public.cache_locks USING btree (expiration);


--
-- TOC entry 3239 (class 1259 OID 251663)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 3227 (class 1259 OID 251637)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 3230 (class 1259 OID 251636)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


-- Completed on 2026-02-11 15:44:57

--
-- PostgreSQL database dump complete
--

