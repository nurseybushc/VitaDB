DROP TABLE IF EXISTS vitadb;
CREATE TABLE vitadb(
    name TEXT,
    icon TEXT,
    version TEXT,
    author TEXT,
    type TEXT,
    description TEXT,
    id TEXT,
    data TEXT,
    date TEXT,
    titleid TEXT,
    screenshots TEXT,
    long_description TEXT,
    downloads TEXT,
    status TEXT,
    source TEXT,
    release_page TEXT,
    trailer TEXT,
    size TEXT,
    data_size TEXT,
    url TEXT
);

DROP TABLE IF EXISTS vitadb_log;
CREATE TABLE vitadb_log(
    author TEXT,
    object TEXT,
    date TEXT,
    id TEXT,
    hb TEXT
);