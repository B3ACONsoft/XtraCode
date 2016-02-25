package capstone.backend.examples.postToCloud.postToCloud;

import android.provider.BaseColumns;

/**
 * Created by AnalEmbargo on 2/21/2016.
 */
public interface LocalDBConstants {

    public static final String DELIM = ",";
    public static final String TEXT_TYPE = "TEXT";

    abstract class ADMINISTRATION implements BaseColumns {
        public static final String TABLE_NAME = "ADMINISTRATION";
        public static final String FIELD_ID = "ADMIN_ID";
        public static final String FIELD_ADMIN_TYPE = "ADMIN_TYPE";
        public static final String FIELD_EMAIL = "EMAIL_ADDRESS";
        public static final String FIELD_PASSWORD = "PASSWORD";
        public static final String FIELD_FIRST_NAME = "FIRST_NAME";
        public static final String FIELD_LAST_NAME = "LAST_NAME";
    }

    abstract class CREATE_DB {
        public static final String CREATE_ADMINISTRATION_TABLE =
                "CREATE TABLE" + ADMINISTRATION.TABLE_NAME + "("
                        + ADMINISTRATION.FIELD_ID + "INTEGER PRIMARY KEY AUTOINCREMENT" + DELIM       //expensive, but worth it?
                        + ADMINISTRATION.FIELD_ADMIN_TYPE + TEXT_TYPE + "NOT NULL" + DELIM
                        + ADMINISTRATION.FIELD_EMAIL + TEXT_TYPE + "NOT NULL" + DELIM
                        + ADMINISTRATION.FIELD_PASSWORD + "INTEGER NOT NULL"  + DELIM
                        + ADMINISTRATION.FIELD_FIRST_NAME  + TEXT_TYPE + "NOT NULL" + DELIM
                        + ADMINISTRATION.FIELD_LAST_NAME + TEXT_TYPE + "NOT NULL" + DELIM
                        + ")";

        public static final String DROP_ADMINISTRATION_TABLE ="DROP TABLE IF EXISTS " + ADMINISTRATION.TABLE_NAME;
    }

    abstract class SELECT_STATEMENTS {
        public static final String SELECT_ALL_FROM_ADMINISTRATION = "SELECT * FROM " + ADMINISTRATION.TABLE_NAME;
    }

}
