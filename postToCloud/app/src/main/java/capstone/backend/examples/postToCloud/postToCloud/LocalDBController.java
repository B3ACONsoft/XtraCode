package capstone.backend.examples.postToCloud.postToCloud;

import android.content.ContentValues;
import android.content.Context;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;

import java.util.ArrayList;
import java.util.HashMap;

/**
 * Created by AnalEmbargo on 2/21/2016.
 */
public class LocalDBController extends SQLiteOpenHelper implements LocalDBConstants {
    public LocalDBController(Context applicationcontext) {
        super(applicationcontext, "user.db", null, 1);
    }
    //Creates Table
    @Override
    public void onCreate(SQLiteDatabase database) {
        String query;
        database.execSQL(CREATE_DB.CREATE_ADMINISTRATION_TABLE);
    }
    @Override
    public void onUpgrade(SQLiteDatabase database, int version_old, int current_version) {
        String query;
        database.execSQL(CREATE_DB.DROP_ADMINISTRATION_TABLE);
        onCreate(database);
    }

    /**
     * Inserts User into SQLite DB
     * @param queryValues
     */
    public void insertUser(HashMap<String, String> queryValues) {
        SQLiteDatabase database = this.getWritableDatabase();
        ContentValues values = new ContentValues();
        values.put(ADMINISTRATION.FIELD_ID, queryValues.get(ADMINISTRATION.FIELD_ID));
        values.put(ADMINISTRATION.FIELD_ADMIN_TYPE, ADMINISTRATION.FIELD_ADMIN_TYPE);
        values.put(ADMINISTRATION.FIELD_EMAIL, ADMINISTRATION.FIELD_EMAIL);
        values.put(ADMINISTRATION.FIELD_PASSWORD, ADMINISTRATION.FIELD_PASSWORD);
        values.put(ADMINISTRATION.FIELD_FIRST_NAME, ADMINISTRATION.FIELD_FIRST_NAME);
        values.put(ADMINISTRATION.FIELD_LAST_NAME, ADMINISTRATION.FIELD_LAST_NAME);
        database.insert("users", null, values);
        database.close();
    }

    /**
     * Get list of Users from SQLite DB as Array List
     * @return
     */
    public ArrayList<HashMap<String, String>> getAllUsers() {
        ArrayList<HashMap<String, String>> usersList;

        usersList = new ArrayList<HashMap<String, String>>();

        SQLiteDatabase database = this.getWritableDatabase();

        Cursor cursor = database.rawQuery(
                SELECT_STATEMENTS.SELECT_ALL_FROM_ADMINISTRATION,
                null);

        if (cursor.moveToFirst()) {
            do {
                HashMap<String, String> map = new HashMap<String, String>();
                map.put(ADMINISTRATION.FIELD_ID, cursor.getString(0));
                map.put(ADMINISTRATION.FIELD_ADMIN_TYPE, cursor.getString(1));
                map.put(ADMINISTRATION.FIELD_EMAIL, cursor.getString(2));
                map.put(ADMINISTRATION.FIELD_PASSWORD, cursor.getString(3));
                map.put(ADMINISTRATION.FIELD_FIRST_NAME, cursor.getString(4));
                map.put(ADMINISTRATION.FIELD_LAST_NAME, cursor.getString(5));
                usersList.add(map);
            } while (cursor.moveToNext());
        }

        database.close();

        return usersList;
    }

}
