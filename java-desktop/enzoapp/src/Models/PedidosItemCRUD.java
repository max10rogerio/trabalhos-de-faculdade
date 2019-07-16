/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Models;

import java.util.List;
import org.hibernate.Query;
import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.cfg.Configuration;

/**
 *
 * @author Kin
 */
public class PedidosItemCRUD {

    /**
     * @param pedidoItem
     * @param args the command line arguments
     */
    public static void Cadastrar(PedidosItem pedidoItem) {

        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.saveOrUpdate(pedidoItem);
        session.getTransaction().commit();
        session.flush();
        session.close();

    }

    public static List Listar() {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();

        Query queryResult = session.createQuery("from PedidosItem");
        List todosPedidosItem;
        todosPedidosItem = queryResult.list();
        for (int i = 0; i < todosPedidosItem.size(); i++) {
            PedidosItem pedidoItem = (PedidosItem) todosPedidosItem.get(i);
        }
        session.flush();
        session.close();
        return todosPedidosItem;

    }

    public static PedidosItem ListarId(int id) {
        PedidosItem pedidoItem = new PedidosItem();
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        Query queryResult = session.createQuery("FROM PedidosItem WHERE id = :id");
        queryResult.setInteger("id", id);
        pedidoItem = (PedidosItem) queryResult.uniqueResult();
        session.flush();
        session.close();
        return pedidoItem;

    }

    public static void Deletar(int id) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        PedidosItem pedidoItem = (PedidosItem) session.load(PedidosItem.class, id);
        session.delete(pedidoItem);
        session.getTransaction().commit();
        session.flush();
        session.close();
    }

    public static void Update(PedidosItem pedidoItem) {
        SessionFactory sessionFactory = new Configuration().configure().buildSessionFactory();
        Session session = sessionFactory.openSession();
        session.beginTransaction();
        session.update(pedidoItem);

        session.getTransaction().commit();
        session.flush();
        session.close();

    }

}
