package Persistencia;

import java.util.ArrayList;

public interface IRepository {
    
    public void save(Object o);
    
    public void update(Object o);
    
    public void delete(Object o);
    
    public ArrayList getAll(String table);
    
    public Object getById(int id, String table);
}
